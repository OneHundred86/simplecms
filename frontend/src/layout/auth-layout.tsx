import React, { FC, Fragment, useState } from "react";
import { Box, Container, Paper } from "@mui/material";

import { AppBar } from "./app-bar";
import { AppMenu, DrawerHeader } from "./menu";

export const AuthLayout: FC = ({ children }) => {
    const [openDrawer, setOpenDrawer] = useState(true);

    const toggleDrawer = () => {
        setOpenDrawer(!openDrawer);
    };

    return (
      <Fragment>
          <AppBar open={openDrawer} toggleDrawer={toggleDrawer} />
          <AppMenu open={openDrawer} toggleDrawer={toggleDrawer} />
          <Box
            component="main"
            sx={{
                flexGrow: 1,
                height: "100vh",
                overflow: "auto",
                display: "flex",
                flexDirection: "column",
                marginLeft: "64px",
                transition: (theme) => theme.transitions.create("width", {
                    easing: theme.transitions.easing.sharp,
                    duration: theme.transitions.duration.leavingScreen
                }),
                ...(openDrawer && {
                    marginLeft: "200px",
                    transition: (theme) => theme.transitions.create("width", {
                        easing: theme.transitions.easing.sharp,
                        duration: theme.transitions.duration.enteringScreen
                    })
                })
            }}>
              <DrawerHeader />
              <Container maxWidth="lg">
                  <Paper sx={{ mt: 4, mb: 4, height: "100%" }}>
                      {children}
                  </Paper>
              </Container>
          </Box>
      </Fragment>
    );
};
