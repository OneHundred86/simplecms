import React, { useState } from 'react';
import {
    Avatar,
    Box,
    Button,
    Container,
    TextField,
    Typography,
} from '@mui/material';

import LockOutlinedIcon from '@mui/icons-material/LockOutlined';
import { LoginService } from '../../services';

export const Login = () => {
    const [loginForm, setLoginForm] = useState({
        email: '',
        password: '',
        code: '',
    });

    function handleSubmit() {
        LoginService.signIn(loginForm);
    }

    function updatedFormValue(key) {
        return (e) => setLoginForm((state) => ({
            ...state,
            [key]: e.target.value,
        }));
    }

    return (
        <Container maxWidth='xs'>
            <Box
                sx={{
                    marginTop: 8,
                    display: 'flex',
                    flexDirection: 'column',
                    alignItems: 'center',
                }}
            >
                <Avatar sx={{ m: 1, bgcolor: 'secondary.main' }}>
                    <LockOutlinedIcon />
                </Avatar>
                <Typography component='h1' variant='h5'>
                    登录
                </Typography>
                <Box component='form' onSubmit={handleSubmit} noValidate sx={{ mt: 1 }}>
                    <TextField
                        margin='normal'
                        required
                        fullWidth
                        id='email'
                        label='电子邮箱'
                        name='email'
                        autoComplete='email'
                        autoFocus
                        value={loginForm.email}
                        onChange={updatedFormValue('email')}
                    />
                    <TextField
                        margin='normal'
                        required
                        fullWidth
                        name='password'
                        label='密码'
                        type='password'
                        id='password'
                        autoComplete='current-password'
                        value={loginForm.password}
                        onChange={updatedFormValue('password')}
                    />
                    <TextField
                        margin='normal'
                        required
                        fullWidth
                        name='code'
                        label='验证码'
                        id='code'
                        value={loginForm.code}
                        onChange={updatedFormValue('code')}
                        InputProps={{
                            endAdornment: <img src='/verify/code' alt='验证码' />,
                        }}
                    />
                    <Button
                        type='submit'
                        fullWidth
                        variant='contained'
                        sx={{ mt: 3, mb: 2 }}
                    >
                        登录
                    </Button>
                </Box>
            </Box>
        </Container>
    );
};