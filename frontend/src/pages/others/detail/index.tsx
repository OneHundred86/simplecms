import React, { useEffect, useState } from 'react';
import { Article } from '../../../models';
import { useHistory, useRouteMatch } from 'react-router';
import { ArticleDataService } from '../../../services';
import { Button, Grid } from '@mui/material';

import { EditForm } from '../components/edit-form';
import { ActionMenu } from '../../../components/form/action-menu';

export const OtherDetail: React.FC = (props) => {
    const [detail, setDetail] = useState<Article>(
        {
            id: 0,
            category: 3,
            content: '',
            covers: [],
            read_cnt: 0,
            status: 0,
            summary: '',
            title: '',
            type: [],
            type_id: 0,
            created_at: '',
            updated_at: '',
        },
    );

    const history = useHistory();
    const { params } = useRouteMatch<{ id: string }>();
    const { id } = params;

    useEffect(() => {
        let fetchDetail = id ? ArticleDataService.getDetail(parseInt(id)).subscribe((resp) => setDetail(resp.data.info)) : null;

        return () => {
            if (fetchDetail) {
                fetchDetail.unsubscribe();
            }
        };
    }, [id]);

    function goBack() {
        history.goBack();
    }

    return <Grid container spacing={2} sx={{ pr: 2, pl: 1 }}>
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
    </Grid>;
};