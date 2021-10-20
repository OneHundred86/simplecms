import { Grid, IconButton, MenuItem, TextField } from '@mui/material';
import SearchIcon from '@mui/icons-material/Search';
import ClearIcon from '@mui/icons-material/Clear';
import React from 'react';

export const categoryList = {
    1: '产品类型',
    2: '应用类型',
    3: '新闻类型',
};

export const FilterToolbar: React.FC<{ filter, setFilter }> = ({ filter, setFilter }) => {
    function handleFilterTypeChange(e) {
        setFilter({
            limit: filter.limit,
            offset: 0,
            category: e.target.value,
            kw: '',
        });
    }

    function handleKWChange(e) {
        setFilter((state) => ({
            ...state,
            offset: 0,
            kw: e.target?.value ?? '',
        }));
    }

    return <Grid container spacing={1} sx={{ m: 1 }}>
        <Grid item xs={2}>
            <TextField
                select
                fullWidth
                id='category-filter'
                label='类型'
                value={filter.category}
                onChange={handleFilterTypeChange}
            >
                {
                    Object.entries(categoryList).map(([key, value]) => {
                        return <MenuItem key={`category-${key}`} value={parseInt(key)}>
                            {value}
                        </MenuItem>;
                    })
                }
            </TextField>
        </Grid>
        <Grid item xs={3} sx={{ display: 'flex', alignItems: 'center' }}>
            <TextField
                variant='standard'
                value={filter.kw}
                onChange={handleKWChange}
                placeholder='关键字查找'
                InputProps={{
                    startAdornment: <SearchIcon fontSize='small' />,
                    endAdornment: (
                        <IconButton
                            title='Clear'
                            aria-label='Clear'
                            size='small'
                            style={{ visibility: filter.kw ? 'visible' : 'hidden' }}
                            onClick={handleKWChange}
                        >
                            <ClearIcon fontSize='small' />
                        </IconButton>
                    ),
                }}
            />
        </Grid>
    </Grid>;
};
