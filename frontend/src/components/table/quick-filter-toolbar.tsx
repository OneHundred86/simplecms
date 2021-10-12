import React, { useEffect, useRef } from 'react';
import { IconButton, InputProps, styled, TextField } from '@mui/material';
import SearchIcon from '@mui/icons-material/Search';
import ClearIcon from '@mui/icons-material/Clear';
import { FilterModel } from '../../models';
import { debounceTime, Subject, tap } from 'rxjs';

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

const filterSubject = new Subject();

export const QuickFilterToolbar: React.FC<QuickFilterToolbarProps> = (props) => {
        const inputRef = useRef(null);
        const clearFilter = () => {
            inputRef.current.value = '';
            filterSubject.next('');
        }
        const onChange = (e) => {
            filterSubject.next(e?.target.value);
        }

        useEffect(() => {
            const filterSubscription = filterSubject.pipe(debounceTime(1500), tap((value) => {
                props.setFilter((filter) => ({ ...filter, kw: value, offset: 0 }));
            })).subscribe();

            return () => {
                filterSubscription.unsubscribe();
            };
        }, [props]);

        return (
            <InlineSearchBox>
                <TextField
                    inputRef={inputRef}
                    variant='standard'
                    defaultValue={props.value}
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