import React from 'react';
import { IconButton, InputProps, styled, TextField } from '@mui/material';
import SearchIcon from '@mui/icons-material/Search';
import ClearIcon from '@mui/icons-material/Clear';
import { FilterModel } from '../../models';

const InlineSearchBox = styled('div')(({ theme }) => ({
    padding: theme.spacing(0.5, 0.5, 0),
    justifyContent: 'space-between',
    display: 'flex',
    alignItems: 'flex-start',
    flexWrap: 'wrap',
    '& MuiTextField-root': {
        [theme.breakpoints.down('xs')]: {
            width: '100%',
        },
        margin: theme.spacing(1, 0.5, 1.5),
        '& .MuiSvgIcon-root': {
            marginRight: theme.spacing(0.5),
        },
        '& .MuiInput-underline:before': {
            borderBottom: `1px solid ${theme.palette.divider}`,
        },
    },
}));

export const QuickFilterToolbar: React.FC<QuickFilterToolbarProps> = (props) => {
        const clearFilter = () => props.setFilter((filter) => ({ ...filter, kw: '', offset: 0 }));
        const onChange = (e) => props.setFilter((filter) => ({ ...filter, kw: e?.target?.value, offset: 0 }));

        return (
            <InlineSearchBox>
                <TextField
                    variant='standard'
                    value={props.value}
                    onChange={onChange}
                    placeholder='关键字查找'
                    InputProps={{
                        startAdornment: <SearchIcon fontSize='small' />,
                        endAdornment: (
                            <IconButton
                                title='Clear'
                                aria-label='Clear'
                                size='small'
                                style={{ visibility: props.value ? 'visible' : 'hidden' }}
                                onClick={clearFilter}
                            >
                                <ClearIcon fontSize='small' />
                            </IconButton>
                        ),
                    }}
                />
            </InlineSearchBox>
        );
    }
;

interface QuickFilterToolbarProps extends InputProps {
    setFilter: (filterState) => Partial<FilterModel>,
};