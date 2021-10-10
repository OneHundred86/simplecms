import React, { useEffect, useState } from 'react';
import { DataGrid, GridColDef, GridRenderCellParams, GridRowModel } from '@mui/x-data-grid';
import { useHistory } from 'react-router';

import { ArticleDataService } from '../../services';
import { Article, ArticleFilter } from '../../models';
import { Box, Fab, IconButton, Link } from '@mui/material';
import { QuickFilterToolbar } from '../../components/table';
import AddIcon from '@mui/icons-material/Add';
import { ConfirmDeleteDialog, ConfirmDeleteDialogProps } from '../../components/dialog/confirm-delete-dialog';
import { tap } from 'rxjs';
import EditIcon from '@mui/icons-material/Edit';
import DeleteIcon from '@mui/icons-material/Delete';

export const Applications = () => {
    const [filter, setFilter] = useState<ArticleFilter>({ kw: '', limit: 20, offset: 0, category: 1 });
    const [dataSource, setDataSource] = useState<Article[]>([]);
    const [totalSize, setTotalSize] = useState<number>(0);
    const [deleteDialog, setDeleteDialog] = useState<ConfirmDeleteDialogProps>({ open: false });
    const history = useHistory();

    useEffect(() => {
        ArticleDataService.getList(filter).subscribe(({ errcode, data }) => {
            if (errcode === 0) {
                setDataSource(data.list);
                setTotalSize(data.total);
            } else {
                // TODO: Notify user error
            }
        });
    }, [filter]);

    function confirmDelete(item: GridRowModel) {
        setDeleteDialog({
            open: true, message: `确认删除行业应用信息: "${item.title}"?`,
            onClose(): void {
                setDeleteDialog({ open: false });
            },
            onConfirm(): void {
                ArticleDataService.delete(item.id).pipe(
                    tap(() => {
                        setFilter({ ...filter });
                        setDeleteDialog({ open: false });
                    }),
                ).subscribe();
            },
        });
    }

    const cols: GridColDef[] = [
        {
            field: 'id',
            headerName: '稿件Id',
            sortable: false,
            renderCell: (params: GridRenderCellParams) => {
                return (<Link href={`/admin/applications/detail/${params.value}`} color='primary'
                >{params.value}</Link>);
            },
        },
        {
            field: 'title',
            headerName: '标题',
            sortable: false,
        },
        {
            field: 'type_id',
            headerName: '类型',
            sortable: false,
        },
        {
            field: 'status',
            headerName: '状态',
            sortable: false,
        },
        {
            field: 'read_cnt',
            headerName: '阅读次数',
            sortable: false,
        },
        {
            field: 'created_time',
            headerName: '创建时间',
            sortable: false,
        },
        {
            field: 'category',
            headerName: '操作',
            sortable: false,
            renderCell: (params: GridRenderCellParams) => {
                return (
                    <>
                        <IconButton component={Link} href={`/admin/applications/detail/${params.row.id}`}>
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
        history.push('/admin/applications/create');
    }

    return (<Box sx={{ height: '100%', width: '100%', p: 1 }}>
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
        </Box>
    );
};