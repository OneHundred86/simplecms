import React, { FC, Fragment, useState } from 'react';
import { Box, Container, Paper, Slide } from '@mui/material';

import { AppBar } from './app-bar';
import { AppMenu, DrawerHeader } from './menu';
import { SnackbarProvider } from 'notistack';

export const AuthLayout: FC = ({ children }) => {
    const [openDrawer, setOpenDrawer] = useState(false);
    const toggleDrawer = () => {
        setOpenDrawer(!openDrawer);
    };

    return (
        <Fragment>
            <AppBar open={openDrawer} toggleDrawer={toggleDrawer} />
            <AppMenu open={openDrawer} toggleDrawer={toggleDrawer} />
            <Box
                component='main'
                sx={{
                    flexGrow: 1,
                    height: '100vh',
                    overflow: 'auto',
                    display: 'flex',
                    flexDirection: 'column',
                }}>
                <DrawerHeader />
                <Container maxWidth='lg'>
                    <SnackbarProvider
                        maxSnack={3}
                        anchorOrigin={{
                            vertical: 'top',
                            horizontal: 'right',
                        }}
                        TransitionComponent={() => <Slide />}
                    >
                        <Paper sx={{ mt: 4, mb: 4, height: '100%' }}>
                            {children}
                        </Paper>
                    </SnackbarProvider>
                </Container>
            </Box>
        </Fragment>
    );
};
