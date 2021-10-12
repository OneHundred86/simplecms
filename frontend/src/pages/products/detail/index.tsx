import React, { useEffect, useState } from 'react';
import { Article } from '../../../models';
import { useHistory, useRouteMatch } from 'react-router';
import { ActionService, ArticleDataService } from '../../../services';
import { Button, Grid } from '@mui/material';

import { EditForm } from '../components/edit-form';
import { ActionMenu } from '../../../components/form/action-menu';
import { CHANNEL_APP_BAR_TITLE, Portal } from '../../../components/portal';
import { useSnackbar } from 'notistack';
import { switchMap } from 'rxjs';

export const ProductDetail: React.FC = (props) => {
    const [detail, setDetail] = useState<Article>(
        {
            id: 0,
            category: 0,
            content: '',
            covers: [],
            read_cnt: 0,
            status: 0,
            summary: '',
            title: '',
            type: [],
            type_id: -1,
            created_at: '',
            updated_at: '',
        },
    );

    const snackBar = useSnackbar();
    const history = useHistory();
    const { params } = useRouteMatch<{ id: string }>();
    const { id } = params;

    useEffect(() => {
        let actionSubscription = id ? [
            ArticleDataService.getDetail(parseInt(id)).subscribe({
                next: (resp) => setDetail(resp.data.info), error: (err) => {
                    console.error('fail to fetch product detail', err);
                    snackBar.enqueueSnackbar(' 获取产品信息失败', {
                        variant: 'error',
                    });
                },
            }),
            ActionService.handleAction('withdraw').pipe(
                switchMap(() => ArticleDataService.withdraw(parseInt(id))),
            ).subscribe({
                next: () => {
                    history.push('/admin/products');
                    snackBar.enqueueSnackbar(' 撤稿成功', {
                        variant: 'success',
                    });
                },
                error: (err) => {
                    console.error('fail to publish', err);
                    snackBar.enqueueSnackbar(' 撤稿失败', {
                        variant: 'error',
                    });
                },
            }),
            ActionService.handleAction('publish').pipe(
                switchMap(() => ArticleDataService.publish(parseInt(id))),
            ).subscribe({
                next: () => {
                    history.push('/admin/products');
                    snackBar.enqueueSnackbar(' 发布成功', {
                        variant: 'success',
                    });
                },
                error: (err) => {
                    console.error('fail to publish', err);
                    snackBar.enqueueSnackbar(' 发布失败', {
                        variant: 'error',
                    });
                },
            }),
        ] : [];

        return () => {
            if (actionSubscription.length > 0) {
                for (const subscription of actionSubscription) {
                    subscription.unsubscribe();
                }
            }
        };
    }, [id, snackBar, history]);

    function goBack() {
        history.goBack();
    }

    return (<>
        <Grid container spacing={2} sx={{ pr: 2, pl: 1 }}>
            <Grid container item xs={12}>
                <Grid item xs={1} sx={{ pl: 1 }}>
                    <Button variant='outlined' onClick={goBack}>返回</Button>
                </Grid>
                <Grid item container justifyContent='flex-end' xs>
                    <ActionMenu status={detail?.status} isCreate={detail?.id === 0} />
                </Grid>
            </Grid>
            <Grid item xs={12}>
                <EditForm detail={detail} />
            </Grid>
        </Grid>
        <Portal channel={CHANNEL_APP_BAR_TITLE}>
            产品中心
        </Portal>
    </>);
};