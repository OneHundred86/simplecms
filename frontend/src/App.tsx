import React from 'react';
import { CssBaseline, ThemeProvider } from '@mui/material';
import theme from './theme';
import { RouterConfig } from './route';

export const App = (props) => {
    return (
        <ThemeProvider theme={theme}>
            <CssBaseline />
            <RouterConfig />
        </ThemeProvider>
    );
};
