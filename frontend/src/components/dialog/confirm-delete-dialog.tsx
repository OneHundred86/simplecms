import React from 'react';
import { Button, Dialog, DialogActions, DialogContent, DialogContentText, DialogTitle } from '@mui/material';

export interface ConfirmDeleteDialogProps {
    open: boolean,
    message?: string,
    onClose?: () => void,
    onConfirm?: () => void,
}

export const ConfirmDeleteDialog: React.FC<ConfirmDeleteDialogProps> = ({ open, message, onClose, onConfirm }) => {

    return <Dialog
        maxWidth='xs'
        open={open}
    >
        <DialogTitle>确认删除</DialogTitle>
        <DialogContent dividers>
            {message && <DialogContentText>
                确认删除?
            </DialogContentText>}
        </DialogContent>
        <DialogActions>
            <Button autoFocus onClick={onClose}>
                取消
            </Button>
            <Button color='warning' onClick={onConfirm}>确认</Button>
        </DialogActions>
    </Dialog>;

};