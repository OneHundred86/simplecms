import React, { ChangeEvent, useEffect, useState } from 'react';
import {
    Box,
    Button,
    Grid,
    IconButton,
    ImageList,
    ImageListItem,
    ImageListItemBar,
    MenuItem,
    Paper,
    TextField,
    Typography,
} from '@mui/material';
import CancelIcon from '@mui/icons-material/Cancel';
import { Article, ArticleType, ArticleTypeListResponse } from '../../../models';
import { CKEditor } from '@ckeditor/ckeditor5-react';
import ClassicEditor from '@xccjh/xccjh-ckeditor5-video-file-upload';
import { ActionService, ArticleDataService, ArticleTypeDataService, FileUploadService } from '../../../services';
import { switchMap } from 'rxjs';
import { useHistory } from 'react-router';
import { useSnackbar } from 'notistack';
import { CKEditorConfig } from '../../../components/editor';

export const EditForm: React.FC<{ detail: Article }> = ({ detail }) => {
    const [formDetail, setFormDetail] = useState<Article>(detail);
    const [categoryList, setCategoryList] = useState<ArticleType[]>([]);
    const history = useHistory();
    const snackBar = useSnackbar();

    useEffect(() => {
        ArticleTypeDataService.getList(3).subscribe((resp: ArticleTypeListResponse) => {
            const categoryList = resp.data.list;
            setCategoryList(categoryList);
        });
    }, []);
    useEffect(() => setFormDetail(detail), [detail]);

    useEffect(() => {
        const saveAction = ActionService.handleAction('save')
            .pipe(
                switchMap(() => {
                    return !formDetail.id
                        ? ArticleDataService.create({
                              category: 3,
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
                        history.push('/admin/news');

                        snackBar.enqueueSnackbar(' ??????????????????', {
                            variant: 'success',
                        });
                    } else {
                        console.error('fail to save news ', resp.errmessage);
                        snackBar.enqueueSnackbar(' ??????????????????', {
                            variant: 'error',
                        });
                    }
                },
                error: (err) => {
                    console.error('fail to save news ', err);
                    snackBar.enqueueSnackbar(' ??????????????????', {
                        variant: 'error',
                    });
                },
            });

        return () => {
            saveAction.unsubscribe();
        };
    }, [formDetail, snackBar, history]);

    function updateInputValue(key: string): (e: ChangeEvent<HTMLInputElement>) => void {
        return (e) => {
            const value = e.target.value;
            setFormDetail((state) => ({
                ...state,
                [key]: value,
            }));
        };
    }

    function handleCategoryChange(e) {
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
                        console.error('fail to upload cover', resp.errmessage);
                        snackBar.enqueueSnackbar(' ??????????????????', {
                            variant: 'error',
                        });
                    }
                },
                error: (err) => {
                    console.error('fail to upload cover', err);
                    snackBar.enqueueSnackbar(' ??????????????????', {
                        variant: 'error',
                    });
                },
            });
        }
    }

    function handleDeleteCover(coverIndex): void {
        setFormDetail((state) => {
            const covers = state.covers ?? [];
            covers.splice(coverIndex, 1);

            return {
                ...state,
                covers,
            };
        });
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
                        sx={{ minWidth: '200px' }}
                        id='news-category'
                        onChange={handleCategoryChange}
                        value={formDetail.type_id > 0 ? formDetail.type_id : ''}
                        label='????????????'>
                        {categoryList.map((x) => {
                            return (
                                <MenuItem key={x.id} value={x.id}>
                                    {x.name}
                                </MenuItem>
                            );
                        })}
                    </TextField>
                </Grid>
                <Grid item xs={12}>
                    <TextField fullWidth label='??????' value={formDetail.title} onChange={updateInputValue('title')} />
                </Grid>
                <Grid item xs={12}>
                    <TextField
                        fullWidth
                        label='??????'
                        rows='4'
                        value={formDetail.summary}
                        onChange={updateInputValue('summary')}
                    />
                </Grid>
                <Grid item xs={12}>
                    <Paper sx={{ mt: 1, p: 1, width: '100%' }} variant='outlined'>
                        <Grid container>
                            <Grid item xs={1}>
                                <Typography variant='subtitle1'>??????</Typography>
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
                                        ????????????
                                    </Button>
                                </label>
                            </Grid>
                            <Grid item xs={12}>
                                <ImageList sx={{ minHeight: '160px', width: '100%' }} cols={5} rowHeight={164}>
                                    {formDetail.covers?.map((item, index) => (
                                        <ImageListItem key={item.id}>
                                            <img src={`${item.img}`} srcSet={`${item.img}`} loading='lazy' alt={''} />
                                            <ImageListItemBar
                                                position='top'
                                                actionPosition='right'
                                                actionIcon={
                                                    <IconButton
                                                        onClick={() => handleDeleteCover(index)}
                                                        sx={{ color: 'red' }}>
                                                        <CancelIcon />
                                                    </IconButton>
                                                }
                                            />
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
                                <Typography variant='subtitle1'>??????</Typography>
                            </Grid>
                            <Grid
                                item
                                sx={{
                                    height: '420px',
                                    '& .ck-editor__main, & .ck-content': { height: '380px' },
                                }}
                                xs={12}>
                                <CKEditor
                                    config={CKEditorConfig}
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
