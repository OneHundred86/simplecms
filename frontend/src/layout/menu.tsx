import React from 'react';
import {
    Divider,
    IconButton, Link,
    List, ListItem, ListItemIcon,
    ListItemText,
    ListSubheader,
    styled,
} from '@mui/material';
import MuiDrawer from '@mui/material/Drawer';
import ChevronLeftIcon from '@mui/icons-material/ChevronLeft';
import AssignmentIcon from '@mui/icons-material/Assignment';
import TouchAppIcon from '@mui/icons-material/TouchApp';
import WebIcon from '@mui/icons-material/Web';
import ListAltIcon from '@mui/icons-material/ListAlt';
import SettingsIcon from '@mui/icons-material/Settings';

const drawerWidth = 240;

const openedMixin = (theme) => ({
    width: drawerWidth,
    transition: theme.transitions.create('width', {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.enteringScreen,
    }),
    overflowX: 'hidden',
});

const closedMixin = (theme) => ({
    transition: theme.transitions.create('width', {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.leavingScreen,
    }),
    overflowX: 'hidden',
    width: `calc(${theme.spacing(7)} + 1px)`,
    [theme.breakpoints.up('sm')]: {
        width: `calc(${theme.spacing(9)} + 1px)`,
    },
});

export const DrawerHeader = styled('div')(({ theme }) => ({
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'flex-end',
    padding: theme.spacing(-1, 1),
    // necessary for content to be below app bar
    ...theme.mixins.toolbar,
}));

const Drawer = styled(MuiDrawer)(
    ({ theme, open }) => ({
        width: drawerWidth,
        flexShrink: 0,
        whiteSpace: 'nowrap',
        boxSizing: 'border-box',
        ...(open && {
            width: drawerWidth,
            transition: theme.transitions.create('width', {
                easing: theme.transitions.easing.sharp,
                duration: theme.transitions.duration.enteringScreen,
            }),
            overflowX: 'hidden',
            '& .MuiDrawer-paper': openedMixin(theme),
        }),
        ...(!open && {
            transition: theme.transitions.create('width', {
                easing: theme.transitions.easing.sharp,
                duration: theme.transitions.duration.leavingScreen,
            }),
            overflowX: 'hidden',
            width: `calc(${theme.spacing(7)} + 1px)`,
            [theme.breakpoints.up('sm')]: {
                width: `calc(${theme.spacing(9)} + 1px)`,
            },
            '& .MuiDrawer-paper': closedMixin(theme),
        }),
    }),
);

export const AppMenu: React.FC<{ open; toggleDrawer }> = ({ open, toggleDrawer }) => {

    return <Drawer variant="permanent" open={open}>
        <DrawerHeader>
            <IconButton onClick={toggleDrawer}>
                <ChevronLeftIcon />
            </IconButton>
        </DrawerHeader>
        <Divider />
        <List>
            <div>
                <ListSubheader inset>稿件管理</ListSubheader>
                <ListItem component={Link} href={'/admin/products'}>
                    <ListItemIcon>
                        <WebIcon />
                    </ListItemIcon>
                    <ListItemText primary='产品中心' />
                </ListItem>
                <ListItem component={Link} href={'/admin/applications'}>
                    <ListItemIcon>
                        <TouchAppIcon />
                    </ListItemIcon>
                    <ListItemText primary='行业应用' />
                </ListItem>
                <ListItem component={Link} href={'/admin/news'}>
                    <ListItemIcon>
                        <ListAltIcon />
                    </ListItemIcon>
                    <ListItemText primary='新闻中心' />
                </ListItem>
                <ListItem component={Link} href={'/admin/news'}>
                    <ListItemIcon>
                        <AssignmentIcon />
                    </ListItemIcon>
                    <ListItemText primary='其他' />
                </ListItem>
            </div>
        </List>
        <Divider />
        <List>
            <div>
                <ListItem component={Link} href={'/admin/settings'}>
                    <ListItemIcon>
                        <SettingsIcon />
                    </ListItemIcon>
                    <ListItemText primary='稿件类型管理' />
                </ListItem>
            </div>
        </List>
    </Drawer>;
};