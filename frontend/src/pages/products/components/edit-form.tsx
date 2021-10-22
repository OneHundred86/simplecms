import React, { ChangeEvent, useEffect, useState } from 'react';
import { Box, Button, Grid, ImageList, ImageListItem, MenuItem, Paper, TextField, Typography } from '@mui/material';
import { Article, ArticleType, ArticleTypeListResponse } from '../../../models';
import { CKEditor } from '@ckeditor/ckeditor5-react';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { ActionService, ArticleDataService, ArticleTypeDataService, FileUploadService } from '../../../services';
import { UploadAdaptorPlugin } from '../../../components/form/upload-adaptor-plugin';
import { switchMap } from 'rxjs';
import { useHistory } from 'react-router';
import { useSnackbar } from 'notistack';

export const EditForm: React.FC<{ detail: Article }> = ({ detail }) => {
    const [formDetail, setFormDetail] = useState<Article>(detail);
    const [categoryList, setCategoryList] = useState<ArticleType[]>([]);
    const [selectedRootCategory, setSelectedRootCategory] = useState<ArticleType>(null);
    const history = useHistory();
    const snackBar = useSnackbar();

    useEffect(() => {
        setFormDetail(detail);
    }, [detail]);

    useEffect(() => {
        ArticleTypeDataService.getList(1).subscribe({
            next: (resp: ArticleTypeListResponse) => {
                const categoryList = resp.data.list;
                setCategoryList(categoryList);
            },
            error: (err) => {
                console.error('fail to fetch article type list', err);
                snackBar.enqueueSnackbar('获取产品类型信息失败', {
                    variant: 'error',
                });
            },
        });
    }, [snackBar]);
    useEffect(() => {
        if (formDetail.type_id >= 0) {
            const selectedRootCategory = categoryList.find((x) => x.id === formDetail.type?.parent_id);
            setSelectedRootCategory(selectedRootCategory);
        }
    }, [categoryList, formDetail.type_id, formDetail.type]);

    useEffect(() => {
        const saveAction = ActionService.handleAction('save')
            .pipe(
                switchMap(() => {
                    return !formDetail.id
                        ? ArticleDataService.create({
                              category: 1,
                              content: formDetail.content,
                              summary: formDetail.summary,
                              title: formDetail.title,
                              type_id: formDetail.type_id,
                              covers: formDetail.covers.map((x) => x.img),
                          })
                        : ArticleDataService.edit({
                              content: formDetail.content,
                              id: formDetail.id,
                              summary: formDetail.summary,
                              title: formDetail.title,
                              type_id: formDetail.type_id,
                              covers: formDetail.covers.map((x) => x.img),
                          });
                })
            )
            .subscribe({
                next: (resp) => {
                    if (resp.errcode === 0) {
                        history.push('/admin/products');
                        snackBar.enqueueSnackbar('保存产品信息成功', {
                            variant: 'success',
                        });
                    } else {
                        console.error('fail to save product', resp.errmessage);
                        snackBar.enqueueSnackbar('保存产品失败', {
                            variant: 'error',
                        });
                    }
                },
                error: (error) => {
                    console.error('fail to save product', error);
                    snackBar.enqueueSnackbar('保存产品失败', {
                        variant: 'error',
                    });
                },
            });

        return () => {
            saveAction.unsubscribe();
        };
    }, [formDetail, snackBar, history]);

    const rootCategoryList: () => ArticleType[] = () => {
        return categoryList.filter((x) => !x.parent_id);
    };
    const childCategoryList: () => ArticleType[] = () => {
        return !selectedRootCategory ? [] : categoryList.filter((x) => x.parent_id === selectedRootCategory.id);
    };

    function updateInputValue(key: string): (e: ChangeEvent<HTMLInputElement>) => void {
        return (e) => {
            const value = e.target.value;
            setFormDetail((state) => ({
                ...state,
                [key]: value,
            }));
        };
    }

    function handleRootCategoryChange(e) {
        const targetCategory = categoryList.find((x) => x.id === e.target.value);
        setSelectedRootCategory(targetCategory);
    }

    function handleChildCategoryChange(e) {
        const targetCategory = categoryList.find((x) => x.id === e.target.value);
        setFormDetail((state) => ({
            ...state,
            type: targetCategory,
            type_id: targetCategory.id,
        }));
    }

    function handleCoverUpload(e) {
        const files = e.target.files;
        if (files && files.length > 0) {
            const formData = new FormData();
            formData.append('file', files[0]);

            FileUploadService.postImage(formData).subscribe({
                next: (resp) => {
                    if (resp.errcode === 0) {
                        setFormDetail((state) => {
                            const covers = state.covers ?? [];
                            covers.push({
                                id: -Math.ceil(Math.random() * 1000),
                                article_id: formDetail.id,
                                img: resp.data.url,
                            });

                            return {
                                ...state,
                                covers,
                            };
                        });
                    } else {
                        console.error('fail to upload image', resp.errmessage);
                        snackBar.enqueueSnackbar(' 上传封面失败', {
                            variant: 'error',
                        });
                    }
                },
                error: (err) => {
                    console.error('fail to upload image', err);
                    snackBar.enqueueSnackbar(' 上传封面失败', {
                        variant: 'error',
                    });
                },
            });
        }
    }

    function handleContentUpdate(event, editor): void {
        const rawContent = editor.getData();

        setFormDetail((state) => ({
            ...state,
            content: rawContent,
        }));
        console.log('editor update >>>', rawContent);
    }

    function clearSelectedFile(e) {
        e.target.value = null;
    }

    return (
        <Box sx={{ '& .MuiTextField-root': { mt: 1, mb: 1 } }} component='form'>
            <Grid container>
                <Grid item xs={12}>
                    <TextField
                        select
                        sx={{ minWidth: '200px', mr: 1 }}
                        id='product-category-root'
                        label='产品类型'
                        value={selectedRootCategory?.id ?? ''}
                        onChange={handleRootCategoryChange}>
                        {rootCategoryList().map((x) => {
                            return (
                                <MenuItem key={`cate-${x.id}`} value={x.id}>
                                    {x.name}
                                </MenuItem>
                            );
                        })}
                    </TextField>
                    <TextField
                        select
                        sx={{ minWidth: '200px' }}
                        id='product-category-child'
                        onChange={handleChildCategoryChange}
                        value={formDetail.type_id > 0 ? formDetail.type_id : ''}
                        label='子类型'>
                        {childCategoryList().map((x) => {
                            return (
                                <MenuItem key={x.id} value={x.id}>
                                    {x.name}
                                </MenuItem>
                            );
                        })}
                    </TextField>
                </Grid>
                <Grid item xs={12}>
                    <TextField
                        fullWidth
                        label='标题'
                        value={formDetail?.title ?? ''}
                        onChange={updateInputValue('title')}
                    />
                </Grid>
                <Grid item xs={12}>
                    <TextField
                        fullWidth
                        label='摘要'
                        rows='4'
                        value={formDetail?.summary ?? ''}
                        onChange={updateInputValue('summary')}
                    />
                </Grid>
                <Grid item xs={12}>
                    <Paper sx={{ mt: 1, p: 1, width: '100%' }} variant='outlined'>
                        <Grid container>
                            <Grid item xs={1}>
                                <Typography variant='subtitle1'>封面</Typography>
                            </Grid>
                            <Grid item container xs justifyContent='flex-end'>
                                <label htmlFor='upload-cover'>
                                    <input
                                        style={{ display: 'none' }}
                                        accept='image/*'
                                        id='upload-cover'
                                        type='file'
                                        onChange={handleCoverUpload}
                                        onClick={clearSelectedFile}
                                    />
                                    <Button variant='contained' component='span'>
                                        添加封面
                                    </Button>
                                </label>
                            </Grid>
                            <Grid item xs={12}>
                                <ImageList sx={{ minHeight: '160px', width: '100%' }} cols={5} rowHeight={164}>
                                    {formDetail.covers?.map((item) => (
                                        <ImageListItem key={item.id}>
                                            <img src={`${item.img}`} srcSet={`${item.img}`} loading='lazy' alt={''} />
                                        </ImageListItem>
                                    )) ?? <div />}
                                </ImageList>
                            </Grid>
                        </Grid>
                    </Paper>
                </Grid>
                <Grid item container xs={12}>
                    <Paper sx={{ mt: 1, p: 1, width: '100%' }} variant='outlined'>
                        <Grid container>
                            <Grid item xs={1}>
                                <Typography variant='subtitle1'>内容</Typography>
                            </Grid>
                            <Grid
                                item
                                sx={{
                                    height: '420px',
                                    '& .ck-editor__main, & .ck-content': { height: '380px' },
                                }}
                                xs={12}>
                                <CKEditor
                                    config={{
                                        extraPlugins: [UploadAdaptorPlugin],
                                    }}
                                    editor={ClassicEditor}
                                    data={formDetail.content}
                                    onChange={handleContentUpdate}
                                />
                            </Grid>
                        </Grid>
                    </Paper>
                </Grid>
            </Grid>
        </Box>
    );
};
