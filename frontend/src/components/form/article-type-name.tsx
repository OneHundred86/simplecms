import React from 'react';
import { ArticleType } from '../../models';
import { Breadcrumbs, Typography } from '@mui/material';

export const ArticleTypeName: React.FC<{ typeList: ArticleType[] }> = ({ typeList }) => {
    const rootCategory = typeList.find(x => !x.parent_id);
    const breadcrumbs = [
        <Typography key={rootCategory.id} color='text.primary'>
            {rootCategory.name}
        </Typography>,
    ];
    const travelList = (parent) => {
        const child = typeList.find(x => x.parent_id === parent.id);
        if (child) {
            breadcrumbs.push(
                <Typography key={child.id} color='text.primary'>
                    {child.name}
                </Typography>);

            travelList(child);
        }
    };
    travelList(rootCategory);

    return (<Breadcrumbs separator='-' aria-label='产品类型'>
        {breadcrumbs}
    </Breadcrumbs>);
};
