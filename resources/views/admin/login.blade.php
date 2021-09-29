<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>后台登录</title>
    <link rel="stylesheet" type="text/css" href="/static/admin/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/login.css" />
</head>

<body>
<div class="m-login-bg">
    <div class="m-login">
        <h3>后台系统登录</h3>
        <div class="m-login-warp">
            <form class="layui-form">
                <div class="layui-form-item">
                    <input type="text" name="username" required lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <input type="password" name="password" required lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <input type="text" name="captcha" required lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-inline">
                        <img class="verifyImg" onclick="refreshVerifyCode(this);" src="/verify/code" />
                    </div>
                </div>
                <div class="layui-form-item m-login-btn">
                    <div class="layui-inline">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="login">登录</button>
                    </div>
                    <div class="layui-inline">
                        <button type="reset" class="layui-btn layui-btn-primary">取消</button>
                    </div>
                </div>
            </form>
        </div>
        <p class="copyright">Copyright 2021-2022</p>
    </div>
</div>
<script src="/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/admin/js/md5.js"></script>
<script>
    function refreshVerifyCode(img)
    {
        img.src = "/verify/code?_r=" + Math.random();
    }

    layui.use(['form', 'jquery'], function() {
        var form = layui.form,
            $ = layui.jquery;

        // //监听提交
        form.on('submit(login)', function (data) {
            data = data.field;

            if (data.username == '') {
                layer.msg('用户名不能为空');
                return false;
            }
            if (data.password == '') {
                layer.msg('密码不能为空');
                return false;
            }
            if (data.captcha == '') {
                layer.msg('验证码不能为空');
                return false;
            }

            $.post('/admin/login',
                {
                    email: data.username,
                    password: md5(data.password),
                    code: data.captcha
                },
                function(data, status){
                    $('.verifyImg').attr('src', "/verify/code?_r=" + Math.random());

                    if(data.errcode != 0){
                        layer.msg(data.errmessage, {
                            time: 2000,
                            icon: 5
                        });

                        return;
                    }

                    location.href = "/admin/";
                });

            return false;
        });

    });
</script>
</body>

</html>