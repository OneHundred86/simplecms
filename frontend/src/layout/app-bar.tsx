import React, { useEffect, useState } from 'react';
import { Button, IconButton, styled, Toolbar, Typography } from '@mui/material';
import MuiAppBar, { AppBarProps as MuiAppBarProps } from '@mui/material/AppBar';
import MenuIcon from '@mui/icons-material/Menu';
import { LoginService, PortalMessageService } from '../services';
import { CHANNEL_APP_BAR_TITLE } from '../components/portal';

interface AppBarProps extends MuiAppBarProps {
    open?: boolean;
}

const StyleAppBar = styled(MuiAppBar, {
    shouldForwardProp: (prop) => prop !== 'open',
})<AppBarProps>(({ theme, open }) => ({
    zIndex: theme.zIndex.drawer + 1,
    transition: theme.transitions.create(['width', 'margin'], {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.leavingScreen,
    }),
    ...(open && {
        marginLeft: '200px',
        // width: `calc(100% - 240px)`,
        transition: theme.transitions.create(['width', 'margin'], {
            easing: theme.transitions.easing.sharp,
            duration: theme.transitions.duration.enteringScreen,
        }),
    }),
}));

export const AppBar: React.FC<{ open; toggleDrawer }> = ({ open, toggleDrawer }) => {
    const [title, setTitle] = useState(null);

    useEffect(() => {
        const titleSubscription = PortalMessageService.onMessage(CHANNEL_APP_BAR_TITLE).subscribe((newTitle) => {
            setTitle(newTitle);
        });

        return () => {
            titleSubscription.unsubscribe();
        };
    }, []);

    const handleSignOut = () => {
        LoginService.signOut().subscribe({
            next: () => {
                window.location.reload();
            }
        });
    }

    return (
        <StyleAppBar position='absolute' open={open}>
            <Toolbar
                sx={{
                    pr: '24px', // keep right padding when drawer closed
                }}>
                <IconButton
                    edge='start'
                    color='inherit'
                    aria-label='open drawer'
                    onClick={toggleDrawer}
                    sx={{
                        marginRight: '36px',
                        // ...(open && { display: 'none' }),
                    }}>
                    <MenuIcon />
                </IconButton>
                <Typography component='h1' variant='h6' color='inherit' noWrap sx={{ flexGrow: 1 }}>
                    {title}
                </Typography>

                <Button onClick={handleSignOut} sx={{ color: '#fff' }} variant="text">
                    注销
                </Button>
            </Toolbar>
        </StyleAppBar>
    );
};
