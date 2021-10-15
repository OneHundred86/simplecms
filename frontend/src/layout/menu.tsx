import React from "react";
import {
    Divider,
    List, ListItem, ListItemIcon,
    ListItemText,
    styled
} from "@mui/material";
import MuiDrawer from "@mui/material/Drawer";
import WidgetsIcon from '@mui/icons-material/Widgets';
import TrendingUpIcon from '@mui/icons-material/TrendingUp';
import AnalyticsIcon from '@mui/icons-material/Analytics';
import ApiIcon from '@mui/icons-material/Api';
import SettingsIcon from "@mui/icons-material/Settings";
import { Link } from "react-router-dom";

const drawerWidth = 200;

const openedMixin = (theme) => ({
    width: drawerWidth,
    marginTop: '64px',
    transition: theme.transitions.create("width", {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.enteringScreen
    }),
    overflowX: "hidden"
});

const closedMixin = (theme) => ({
    transition: theme.transitions.create("width", {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.leavingScreen
    }),
    marginTop: '64px',
    overflowX: "hidden",
    width: `calc(${theme.spacing(6)} + 1px)`,
    [theme.breakpoints.up("sm")]: {
        width: `calc(${theme.spacing(7)} + 1px)`
    }
});

export const DrawerHeader = styled("div")(({ theme }) => ({
    display: "flex",
    alignItems: "center",
    justifyContent: "flex-end",
    padding: theme.spacing(-1, 1),
    // necessary for content to be below app bar
    ...theme.mixins.toolbar
}));

const Drawer = styled(MuiDrawer)(
  ({ theme, open }) => ({
      width: drawerWidth,
      flexShrink: 0,
      whiteSpace: "nowrap",
      boxSizing: "border-box",
      ...(open && {
          width: drawerWidth,
          transition: theme.transitions.create("width", {
              easing: theme.transitions.easing.sharp,
              duration: theme.transitions.duration.enteringScreen
          }),
          overflowX: "hidden",
          "& .MuiDrawer-paper": openedMixin(theme)
      }),
      ...(!open && {
          transition: theme.transitions.create("width", {
              easing: theme.transitions.easing.sharp,
              duration: theme.transitions.duration.leavingScreen
          }),
          overflowX: "hidden",
          width: `calc(${theme.spacing(7)} + 1px)`,
          [theme.breakpoints.up("sm")]: {
              width: `calc(${theme.spacing(9)} + 1px)`
          },
          "& .MuiDrawer-paper": closedMixin(theme)
      })
  })
);

export const AppMenu: React.FC<{ open; toggleDrawer }> = ({ open, toggleDrawer }) => {

    return <Drawer variant="permanent" open={open}>
{/*
        <DrawerHeader>
            <IconButton onClick={toggleDrawer}>
                <ChevronLeftIcon />
            </IconButton>
        </DrawerHeader>
*/}
        <Divider />
        <List>
            <div>
                {/*<ListSubheader inset>稿件管理</ListSubheader>*/}
                <Link to={"/admin/products"}>
                    <ListItem>
                        <ListItemIcon>
                            <WidgetsIcon />
                        </ListItemIcon>
                        <ListItemText primary="产品中心" />
                    </ListItem>
                </Link>


                <Link to={"/admin/applications"}>
                    <ListItem>
                        <ListItemIcon>
                            <TrendingUpIcon />
                        </ListItemIcon>
                        <ListItemText primary="行业应用" />
                    </ListItem>
                </Link>

                <Link to={"/admin/news"}>
                    <ListItem>
                        <ListItemIcon>
                            <AnalyticsIcon />
                        </ListItemIcon>
                        <ListItemText primary="新闻中心" />
                    </ListItem>
                </Link>

                <Link to={"/admin/others"}>
                    <ListItem>
                        <ListItemIcon>
                            <ApiIcon />
                        </ListItemIcon>
                        <ListItemText primary="其他" />
                    </ListItem>
                </Link>
            </div>
        </List>
        <Divider />
        <List>
            <div>

                <Link to={"/admin/settings"}>
                    <ListItem>
                        <ListItemIcon>
                            <SettingsIcon />
                        </ListItemIcon>
                        <ListItemText primary="稿件类型管理" />
                    </ListItem>
                </Link>
            </div>
        </List>
    </Drawer>;
};