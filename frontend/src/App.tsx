import React from 'react';
import { CssBaseline, ThemeProvider } from '@mui/material';
import theme from './theme';
import { RouterConfig } from './route';
import { SnackbarProvider } from "notistack";

export const App = (props) => {
    return (
        <ThemeProvider theme={theme}>
            <CssBaseline />

            <SnackbarProvider
              maxSnack={3}
              anchorOrigin={{
                  vertical: "top",
                  horizontal: "right"
              }}
            >
                <RouterConfig />
            </SnackbarProvider>
        </ThemeProvider>
    );
};
