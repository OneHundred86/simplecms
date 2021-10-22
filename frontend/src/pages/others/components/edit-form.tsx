import React, { ChangeEvent, useEffect, useState } from 'react';
import { Box, Button, Grid, ImageList, ImageListItem, MenuItem, Paper, TextField, Typography } from '@mui/material';
import { Article } from '../../../models';
import { CKEditor } from '@ckeditor/ckeditor5-react';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { ActionService, ArticleDataService, FileUploadService } from '../../../services';
import { UploadAdaptorPlugin } from '../../../components/form/upload-adaptor-plugin';
import { switchMap } from 'rxjs';
import { useHistory } from 'react-router';
import { useSnackbar } from 'notistack';

export const EditForm: React.FC<{ detail: Article }> = ({ detail }) => {
    const [formDetail, setFormDetail] = useState<Article>(detail);
    const history = useHistory();
    const snackBar = useSnackbar();

    useEffect(() => setFormDetail(detail), [detail]);

    useEffect(() => {
        const saveAction = ActionService.handleAction('save')
            .pipe(
                switchMap(() => {
                    return !formDetail.id
                        ? ArticleDataService.create({
                              category: 0,
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
                        history.push('/admin/others');
                        snackBar.enqueueSnackbar('保存其他信息成功', {
                            variant: 'success',
                        });
                    } else {
                        console.error('fail to save others', resp.errmessage);
                        snackBar.enqueueSnackbar(' 保存其他信息失败', {
                            variant: 'error',
                        });
                    }
                },
                error: (err) => {
                    console.error('fail to save others', err);
                    snackBar.enqueueSnackbar(' 保存其他信息失败', {
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
                        snackBar.enqueueSnackbar(' 上传封面失败', {
                            variant: 'error',
                        });
                    }
                },
                error: (err) => {
                    console.error('fail to upload cover', err);
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
                        id='other-category-root'
                        label='类型'
                        value={'0'}
                        SelectProps={{
                            readOnly: true,
                        }}>
                        <MenuItem key='0' value='0'>
                            其他
                        </MenuItem>
                    </TextField>
                </Grid>
                <Grid item xs={12}>
                    <TextField fullWidth label='标题' value={formDetail.title} onChange={updateInputValue('title')} />
                </Grid>
                <Grid item xs={12}>
                    <TextField
                        fullWidth
                        label='摘要'
                        rows='4'
                        value={formDetail.summary}
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
                                            <img src={`${item.img}`} alt={''} />
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
