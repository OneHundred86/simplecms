import React from 'react';
import { Box } from '@mui/material';
import { Route, Switch } from 'react-router-dom';
import { AuthLayout } from '../layout';
import { Products } from '../pages/products';
import { ProductDetail } from '../pages/products/detail';
import { Applications } from '../pages/applications';
import { ApplicationDetail } from '../pages/applications/detail';
import { News } from '../pages/news';
import { NewsDetail } from '../pages/news/detail';
import { Others } from '../pages/others';
import { OtherDetail } from '../pages/others/detail';
import { Settings } from '../pages/settings';
import { PublicLayout } from '../layout/public-layout';
import { Login } from '../pages/login';

export const RouterConfig = () => {
    return (
        <Box>
            <PublicLayout>
                <Switch>
                    <Route path={'/admin/login'} exact={true}>
                        <Login />
                    </Route>
                </Switch>
            </PublicLayout>
            <AuthLayout>
                <Switch>
                    <Route path={'/admin/settings'} exact={true}>
                        <Settings />
                    </Route>
                    <Route path={'/admin/products'} exact={true}>
                        <Products />
                    </Route>
                    <Route path={'/admin/products/create'} exact={true}>
                        <ProductDetail />
                    </Route>
                    <Route path={'/admin/products/detail/:id'} exact={true}>
                        <ProductDetail />
                    </Route>
                    <Route path={'/admin/applications'} exact={true}>
                        <Applications />
                    </Route>
                    <Route path={'/admin/applications/create'} exact={true}>
                        <ApplicationDetail />
                    </Route>
                    <Route path={'/admin/applications/detail/:id'} exact={true}>
                        <ApplicationDetail />
                    </Route>
                    <Route path={'/admin/news'} exact={true}>
                        <News />
                    </Route>
                    <Route path={'/admin/news/create'} exact={true}>
                        <NewsDetail />
                    </Route>
                    <Route path={'/admin/news/detail/:id'} exact={true}>
                        <NewsDetail />
                    </Route>
                    <Route path={'/admin/others'} exact={true}>
                        <Others />
                    </Route>
                    <Route path={'/admin/others/create'} exact={true}>
                        <OtherDetail />
                    </Route>
                    <Route path={'/admin/others/detail/:id'} exact={true}>
                        <OtherDetail />
                    </Route>
                </Switch>
            </AuthLayout>
        </Box>
    );
};
