import { Box } from '@mui/material';
import React from 'react';

export const PublicLayout: React.FC = (props) => {
    return <Box
        sx={{
            marginTop: 8,
            display: 'flex',
            flexDirection: 'column',
            alignItems: 'center',
        }}
    >
        {props.children}
    </Box>;
};