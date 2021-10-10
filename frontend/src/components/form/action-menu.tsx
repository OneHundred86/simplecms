import React, { useState } from 'react';
import { Button } from '@mui/material';
import KeyboardArrowDownIcon from '@mui/icons-material/KeyboardArrowDown';
import Menu from '@mui/material/Menu';
import MenuItem from '@mui/material/MenuItem';
import { ActionService } from '../../services';

export const ActionMenu: React.FC<{ status: number, isCreate: boolean }> = ({ status, isCreate }) => {
    const [anchorEl, setAnchorEl] = useState(null);

    function handleOpen(e) {
        setAnchorEl(e.currentTarget);
    }

    function closeMenu() {
        setAnchorEl(null);
    }

    function handleSave() {
        ActionService.save();
        closeMenu();
    }

    function handlePublish() {
        ActionService.publish();
        closeMenu();
    }

    function handleWithdraw() {
        ActionService.withdraw();
        closeMenu();
    }

    return <div>
        <Button
            id='action-button'
            aria-controls='action-menu'
            aria-haspopup='true'
            aria-expanded={anchorEl ? 'true' : undefined}
            variant='contained'
            color={!status ? 'info' : 'success'}
            disableElevation
            onClick={handleOpen}
            endIcon={<KeyboardArrowDownIcon />}
        >
            {status === 0 ? '草稿' : '已发布'}
        </Button>
        <Menu
            id='action-menu'
            open={!!anchorEl}
            anchorEl={anchorEl}
            anchorOrigin={{
                vertical: 'bottom',
                horizontal: 'right',
            }}
            transformOrigin={{
                vertical: 'top',
                horizontal: 'right',
            }} MenuListProps={{
            'aria-labelledby': 'long-button',
        }}
            onClose={closeMenu}
            PaperProps={{
                style: {
                    width: '160px',
                },
            }}
        >
            {
                isCreate ?
                    <MenuItem key='edit' onClick={handleSave}>
                        保存
                    </MenuItem>
                    : (
                        <>
                            <MenuItem key='edit' onClick={handleSave}>
                                保存
                            </MenuItem>
                            <MenuItem key='publish' onClick={handlePublish}>
                                发布
                            </MenuItem>
                            <MenuItem key='withdraw' onClick={handleWithdraw}>
                                撤稿
                            </MenuItem>
                        </>
                    )
            }
        </Menu>
    </div>;
};
