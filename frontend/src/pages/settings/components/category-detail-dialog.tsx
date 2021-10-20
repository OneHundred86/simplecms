import React, { useEffect, useState } from "react";
import { ArticleType } from "../../../models";
import { Button, Dialog, DialogActions, DialogContent, DialogTitle, MenuItem, TextField } from "@mui/material";

export interface CategoryDetailDialogProps {
    category: number;
    title: string;
    typeList: ArticleType[];
    open: boolean;
    typeDetail?: ArticleType;
    onSave?: (form: ArticleType) => void;
    onClose?: () => void;
}

export const CategoryDetailDialog: React.FC<CategoryDetailDialogProps> = ({
                                                                              category,
                                                                              title,
                                                                              open,
                                                                              typeList,
                                                                              onSave,
                                                                              onClose,
                                                                              typeDetail
                                                                          }) => {
    const [formDetail, setFormDetail] = useState<ArticleType>(typeDetail);
    useEffect(() => {
        setFormDetail(typeDetail);
    }, [typeDetail]);

    function handleClose() {
        onClose && onClose();
    }

    function handleSubmit() {
        onSave && onSave(formDetail);
    }

    function handleNameChange(e) {
        setFormDetail((state) => ({
            ...state,
            name: e.target.value
        }));
    }

    function handleParentIdChange(e) {
        setFormDetail((state) => ({
            ...state,
            parent_id: e.target.value
        }));
    }

    return (
      <Dialog open={open}>
          <DialogTitle>{title}</DialogTitle>
          {open &&
          <DialogContent>
            <TextField
              autoFocus
              required
              margin="dense"
              id="name"
              label="名称"
              type="text"
              value={formDetail?.name ?? ""}
              fullWidth
              onChange={handleNameChange}
            />
              {category === 1 && (
                <TextField
                  select
                  autoFocus
                  margin="dense"
                  id="parent_id"
                  label="父级类型"
                  type="text"
                  value={formDetail?.parent_id ?? ""}
                  fullWidth
                  onChange={handleParentIdChange}
                  SelectProps={{
                      readOnly: formDetail?.id >= 0
                  }}>
                    <MenuItem key="empty" value={""}>
                        无
                    </MenuItem>
                    {typeList.map((x) => {
                        return (
                          <MenuItem key={x.id} value={x.id}>
                              {x.name}
                          </MenuItem>
                        );
                    })}
                </TextField>
              )}
          </DialogContent>
          }
          <DialogActions>
              <Button onClick={handleClose}>取消</Button>
              <Button variant="contained" onClick={handleSubmit}>
                  保存
              </Button>
          </DialogActions>
      </Dialog>
    );
};
