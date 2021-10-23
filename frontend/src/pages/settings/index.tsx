import React, { useEffect, useState } from "react";
import { DataGrid, GridColDef, GridRenderEditCellParams } from "@mui/x-data-grid";

import { ArticleTypeDataService } from "../../services";
import { ArticleFilter, ArticleType } from "../../models";
import { Box, Fab, IconButton } from "@mui/material";
import AddIcon from "@mui/icons-material/Add";
import EditIcon from "@mui/icons-material/Edit";
import DeleteIcon from "@mui/icons-material/Delete";
import { categoryList, FilterToolbar } from "./components/filter-toolbar";
import { CategoryDetailDialog, CategoryDetailDialogProps } from "./components/category-detail-dialog";
import { ConfirmDeleteDialog, ConfirmDeleteDialogProps } from "../../components/dialog/confirm-delete-dialog";
import { tap } from "rxjs";
import { CHANNEL_APP_BAR_TITLE, Portal } from "../../components/portal";
import { useSnackbar } from "notistack";

export const Settings = () => {
    const [filter, setFilter] = useState<ArticleFilter>({ kw: "", limit: 20, offset: 0, category: 1 });
    const [dataSource, setDataSource] = useState<ArticleType[]>([]);
    const [detailDialog, setDetailDialog] = useState<CategoryDetailDialogProps>({
        open: false,
        category: -1,
        typeList: [],
        title: ""
    });
    const [deleteDialog, setDeleteDialog] = useState<ConfirmDeleteDialogProps>({
        open: false
    });
    const [fetchFlag, setFetchFlag] = useState(new Date().valueOf());
    const snackBar = useSnackbar();

    useEffect(() => {
        const typeListSubscription = ArticleTypeDataService.getList(filter.category).subscribe(({ errcode, data }) => {
            if (errcode === 0) {
                setDataSource(data.list);
            } else {
                snackBar.enqueueSnackbar("获取类型列表失败", {
                    variant: "error"
                });
            }
        });

        return () => {
            typeListSubscription.unsubscribe();
        };
    }, [filter.category, snackBar, fetchFlag]);

    function deleteItem(item: ArticleType) {
        setDeleteDialog({
            open: true,
            message: `确认删除"${item.name}"?`,
            onClose(): void {
                setDeleteDialog({ open: false });
            },
            onConfirm(): void {
                ArticleTypeDataService.delete(item.id)
                  .pipe(
                    tap(() => {
                        setDeleteDialog({ open: false });
                        setFetchFlag(new Date().valueOf());
                    })
                  )
                  .subscribe();
            }
        });
    }

    const cols: GridColDef[] = [
        {
            field: "id",
            headerName: "类型Id",
            sortable: false
        },
        {
            field: "name",
            headerName: "名称",
            flex: 1,
            sortable: false
        },
        {
            field: "parent_id",
            headerName: "父类型id",
            sortable: false
        },
        {
            field: "category",
            headerName: "操作",
            flex: 1,
            sortable: false,
            renderCell: (params: GridRenderEditCellParams) => {
                return (
                  <>
                      <IconButton onClick={() => editItemDialog(params.row)}>
                          <EditIcon />
                      </IconButton>
                      <IconButton onClick={() => deleteItem(params.row)}>
                          <DeleteIcon />
                      </IconButton>
                  </>
                );
            }
        }
    ];

    function pageChange(pageNumber: number): void {
        setFilter((filter) => ({ ...filter, offset: pageNumber }));
    }

    function pageSizeChange(pageSize: number): void {
        setFilter((filter) => ({ ...filter, limit: pageSize, offset: 0 }));
    }

    const filterData = () => {
        let result = dataSource;
        if (filter.kw) {
            result = dataSource.filter((x) => x.name.includes(filter.kw));
        }

        const step = filter.offset * filter.limit;
        return result.filter((x, i) => i >= step && i < step + filter.limit);
    };

    function closeDetailDialog() {
        setDetailDialog((state) => ({
            ...state,
            onSave: null,
            onClose: null,
            open: false
        }));
    }

    const saveObserver = {
        next: (resp) => {
            if (resp.errcode === 0) {
                setDetailDialog(null);
                setFetchFlag(new Date().valueOf());
            } else {
                console.error("保存类型失败", resp.errmessage);
                snackBar.enqueueSnackbar("保存失败", {
                    variant: "error"
                });
            }
        },
        error: (error) => {
            console.error("保存类型失败", error);
            snackBar.enqueueSnackbar("保存失败", {
                variant: "error"
            });
        }
    };

    function createItem(newForm: ArticleType) {
        ArticleTypeDataService.creat({
            category: newForm.category,
            name: newForm.name,
            parent_id: newForm.parent_id
        }).subscribe(saveObserver);
    }

    function saveItem(newForm: ArticleType) {
        ArticleTypeDataService.edit({
            id: newForm.id,
            name: newForm.name
        }).subscribe(saveObserver);
    }

    function editItemDialog(item: ArticleType) {
        setDetailDialog({
            open: true,
            title: `编辑${categoryList[filter.category]}`,
            category: filter.category,
            typeList: dataSource,
            onClose: closeDetailDialog,
            onSave: saveItem,
            typeDetail: item
        });
    }

    function newItemDialog() {
        setDetailDialog({
            open: true,
            title: `新增${categoryList[filter.category]}`,
            category: filter.category,
            typeList: dataSource,
            onClose: closeDetailDialog,
            onSave: createItem,
            typeDetail: {
                id: -1,
                name: "",
                parent_id: null,
                category: filter.category
            }
        });
    }

    return (
      <Box sx={{ height: "100%", width: "100%", p: 1 }}>
          <DataGrid
            autoHeight
            disableColumnMenu={true}
            disableColumnFilter={true}
            pagination
            pageSize={filter.limit}
            page={filter.offset}
            rowCount={filterData().length}
            paginationMode="server"
            rowsPerPageOptions={[10, 20, 50, 100]}
            onPageChange={pageChange}
            onPageSizeChange={pageSizeChange}
            components={{ Toolbar: FilterToolbar }}
            componentsProps={{
                toolbar: {
                    filter,
                    setFilter
                }
            }}
            columns={cols}
            rows={filterData()}
          />
          <Fab
            sx={{
                position: "fixed",
                bottom: 16,
                right: 48
            }}
            size="medium"
            color="primary"
            aria-label="add"
            onClick={newItemDialog}>
              <AddIcon />
          </Fab>
          <CategoryDetailDialog {...detailDialog} />
          <ConfirmDeleteDialog {...deleteDialog} />

          <Portal channel={CHANNEL_APP_BAR_TITLE}>类型设置</Portal>
      </Box>
    );
};
