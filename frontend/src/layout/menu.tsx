import React from 'react';
import {
    Divider,
    IconButton, Link,
    List, ListItem, ListItemIcon,
    ListItemText,
    ListSubheader,
    styled,
    Toolbar,
} from '@mui/material';
import MuiDrawer from '@mui/material/Drawer';
import ChevronLeftIcon from '@mui/icons-material/ChevronLeft';
import AssignmentIcon from '@mui/icons-material/Assignment';

const Drawer = styled(MuiDrawer)(
    ({ theme, open }) => ({
        '& .MuiDrawer-paper': {
            position: 'relative',
            whiteSpace: 'nowrap',
            width: 240,
            transition: theme.transitions.create('width', {
                easing: theme.transitions.easing.sharp,
                duration: theme.transitions.duration.enteringScreen,
            }),
            boxSizing: 'border-box',
            ...(!open && {
                overflowX: 'hidden',
                transition: theme.transitions.create('width', {
                    easing: theme.transitions.easing.sharp,
                    duration: theme.transitions.duration.leavingScreen,
                }),
                width: theme.spacing(7),
                [theme.breakpoints.up('sm')]: {
                    width: theme.spacing(9),
                },
            }),
        },
    }),
);

export const AppMenu: React.FC<{ open; toggleDrawer }> = ({ open, toggleDrawer }) => {

    return <Drawer open={open}>
        <Toolbar
            sx={{
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'flex-end',
                px: [1],
            }}
        >
            <IconButton onClick={toggleDrawer}>
                <ChevronLeftIcon />
            </IconButton>
        </Toolbar>
        <Divider />
        <List>
            <div>
                <ListSubheader inset>稿件管理</ListSubheader>
                <ListItem component={Link} href={'/admin/products'}>
                    <ListItemIcon>
                        <AssignmentIcon />
                    </ListItemIcon>
                    <ListItemText primary='产品中心' />
                </ListItem>
                <ListItem component={Link} href={'/admin/applications'}>
                    <ListItemIcon>
                        <AssignmentIcon />
                    </ListItemIcon>
                    <ListItemText primary='行业应用' />
                </ListItem>
                <ListItem component={Link} href={'/admin/news'}>
                    <ListItemIcon>
                        <AssignmentIcon />
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
                        <AssignmentIcon />
                    </ListItemIcon>
                    <ListItemText primary='稿件类型管理' />
                </ListItem>
            </div>
        </List>
    </Drawer>;
};