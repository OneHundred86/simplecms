import React, { useMemo, useState } from 'react';
import { Avatar, Box, Button, Container, TextField, Typography } from '@mui/material';

import LockOutlinedIcon from '@mui/icons-material/LockOutlined';
import { LoginService } from '../../services';
import { useHistory } from 'react-router';
import { useSnackbar } from 'notistack';

export const Login = () => {
    const [codeState, setCodeState] = useState(new Date().valueOf());
    const [loginForm, setLoginForm] = useState({
        email: '',
        password: '',
        code: '',
    });
    const [errorForm, setErrorForm] = useState({
        email: false,
        password: false,
        code: false,
        summary: '',
    });
    const history = useHistory();
    const snakeBar = useSnackbar();

    function handleSubmit(e) {
        e.preventDefault();

        if (loginForm.email && loginForm.password && loginForm.code) {
            setErrorForm({
                email: false,
                code: false,
                password: false,
                summary: '',
            });
            LoginService.signIn(loginForm).subscribe({
                next: (resp) => {
                    if (resp.errcode === 200) {
                        history.push('/');
                    } else {
                        setErrorForm({
                            ...errorForm,
                            summary: resp.errmessage,
                        });
                    }
                },
                error: (err) => {
                    snakeBar.enqueueSnackbar('登录失败', {
                        variant: 'error',
                    });
                },
            });
        } else {
            const newState = {
                email: !loginForm.email,
                password: !loginForm.password,
                code: !loginForm.code,
            };
            setErrorForm({ ...errorForm, ...newState });
        }
    }

    function updatedFormValue(key) {
        return (e) => {
            setErrorForm({
                ...errorForm,
                [key]: !e.target?.value,
            });

            setLoginForm((state) => ({
                ...state,
                [key]: e.target.value,
            }));
        };
    }

    function refreshCode(): void {
        setCodeState(new Date().valueOf());
    }

    const codeUrl = useMemo(() => {
        return `/verify/code?state=${codeState}`;
    }, [codeState]);

    return (
        <Container maxWidth='xs'>
            <Box
                sx={{
                    marginTop: 8,
                    display: 'flex',
                    flexDirection: 'column',
                    alignItems: 'center',
                }}>
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
                        error={errorForm.email}
                        helperText={errorForm.email && '请输入电子邮箱'}
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
                        error={errorForm.password}
                        helperText={errorForm.password && '请输入密码'}
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
                            endAdornment: <img src={codeUrl} onClick={refreshCode} alt='验证码' />,
                        }}
                        error={errorForm.code}
                        helperText={errorForm.code && '请输入验证码'}
                    />
                    {errorForm.summary && (
                        <Typography variant='overline' color={'red'}>
                            {errorForm.summary}
                        </Typography>
                    )}
                    <Button type='submit' fullWidth variant='contained' sx={{ mt: 3, mb: 2 }}>
                        登录
                    </Button>
                </Box>
            </Box>
        </Container>
    );
};
