import React, { useEffect, useState } from 'react';
import { DataGrid, GridColDef, GridRenderCellParams, GridRowModel } from '@mui/x-data-grid';

import { ArticleDataService } from '../../services';
import { Article, ArticleFilter } from '../../models';
import { Box, Fab, IconButton, Typography } from '@mui/material';
import { QuickFilterToolbar } from '../../components/table';
import AddIcon from '@mui/icons-material/Add';
import EditIcon from '@mui/icons-material/Edit';
import DeleteIcon from '@mui/icons-material/Delete';
import { useHistory } from 'react-router';
import { tap } from 'rxjs';
import { ConfirmDeleteDialog, ConfirmDeleteDialogProps } from '../../components/dialog/confirm-delete-dialog';
import { CHANNEL_APP_BAR_TITLE, Portal } from '../../components/portal';
import { useSnackbar } from 'notistack';
import { Link } from 'react-router-dom';

export const Products: React.FC = () => {
    const [filter, setFilter] = useState<ArticleFilter>({ kw: '', limit: 20, offset: 0, category: 1 });
    const [dataSource, setDataSource] = useState<Article[]>([]);
    const [totalSize, setTotalSize] = useState<number>(1);
    const [deleteDialog, setDeleteDialog] = useState<ConfirmDeleteDialogProps>({ open: false });

    const history = useHistory();
    const snackBar = useSnackbar();

    useEffect(() => {
        ArticleDataService.getList(filter).subscribe({
            next: ({ errcode, data }) => {
                if (errcode === 0) {
                    setDataSource(data.list);
                    setTotalSize(data.total);
                } else {
                    console.error('fetch products error', errcode);
                    snackBar.enqueueSnackbar('获取产品列表失败', {
                        variant: 'error',
                    });
                }
            }, error: (err) => {
                console.error('fetch products error', err);
                snackBar.enqueueSnackbar('获取产品列表失败', {
                    variant: 'error',
                });
            },
        });
    }, [filter, snackBar]);

    function confirmDelete(item: GridRowModel) {
        setDeleteDialog({
            open: true, message: `确认删除产品信息: "${item.title}"?`,
            onClose(): void {
                setDeleteDialog({ open: false });
            },
            onConfirm: function(): void {
                ArticleDataService.delete(item.id).pipe(
                    tap(() => {
                        setFilter({ ...filter });
                        setDeleteDialog({ open: false });

                        snackBar.enqueueSnackbar('删除产品成功', {
                            variant: 'success',
                        });
                    }),
                ).subscribe({
                    error: (err) => {
                        snackBar.enqueueSnackbar(' 删除产品失败', {
                            variant: 'error',
                        });
                    },
                });
            },
        });

    }

    const cols: GridColDef[] = [
        {
            field: 'id',
            headerName: '稿件Id',
            sortable: false,
            renderCell: (params: GridRenderCellParams) => (
                <Link to={`/admin/products/detail/${params.value}`}>{params.value}</Link>),
        },
        {
            field: 'title',
            headerName: '标题',
            flex: 1,
            sortable: false,
        },
        {
            field: 'type_id',
            headerName: '类型',
            sortable: false,
            renderCell: (params) => (
                <Typography>{params.row.type?.name ?? ''}</Typography>
            ),
        },
        {
            field: 'status',
            headerName: '状态',
            sortable: false,
            renderCell: (params) => (
                <Typography>{params.value === 0 ? '草稿' : '已发布'}</Typography>
            ),
        },
        {
            field: 'read_cnt',
            headerName: '阅读次数',
            sortable: false,
        },
        {
            field: 'created_at',
            headerName: '创建时间',
            flex: 1,
            sortable: false,
        },
        {
            field: 'category',
            headerName: '操作',
            sortable: false,
            renderCell: (params: GridRenderCellParams) => {
                return (
                    <>
                        <IconButton component={Link} to={`/admin/products/detail/${params.row.id}`}>
                            <EditIcon />
                        </IconButton>
                        <IconButton onClick={() => confirmDelete(params.row)}>
                            <DeleteIcon />
                        </IconButton>
                    </>
                );
            },
        },
    ];

    function pageChange(pageNumber: number): void {
        setFilter((filter) => ({ ...filter, offset: pageNumber }));
    }

    function pageSizeChange(pageSize: number): void {
        setFilter((filter) => ({ ...filter, limit: pageSize, offset: 0 }));
    }

    function createItem() {
        history.push('/admin/products/create');
    }

    return (
        <Box sx={{ height: '100%', width: '100%', p: 1 }}>
            <DataGrid
                autoHeight
                disableColumnMenu={true}
                disableColumnFilter={true}
                pagination
                pageSize={filter.limit}
                page={filter.offset}
                rowCount={totalSize}
                rowsPerPageOptions={[10, 20, 50, 100]}
                onPageChange={pageChange}
                onPageSizeChange={pageSizeChange}
                components={{ Toolbar: QuickFilterToolbar }}
                componentsProps={{
                    toolbar: {
                        value: filter.kw,
                        setFilter,
                    },
                }}
                columns={cols}
                rows={dataSource}
            />
            <Fab
                sx={{
                    position: 'fixed',
                    bottom: 16,
                    right: 48,
                }}
                size='medium'
                color='primary'
                aria-label='add'
                onClick={createItem}
            >
                <AddIcon />
            </Fab>
            <ConfirmDeleteDialog {...deleteDialog} />
            <Portal channel={CHANNEL_APP_BAR_TITLE}>
                产品中心
            </Portal>
        </Box>
    );
};
