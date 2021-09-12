<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cms</title>
    <!-- 引入 layui.css -->
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/layui/layui.js"></script>
    <script src="/js/md5.js"></script>
</head>
<body style="background-color: #1E9FFF">
<div style="width: 500px; margin: auto;background-color: white; margin-top: 200px;">
    <form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label" style="font-weight: 700;">帐号登录</label>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
                <input type="text" id="email" required lay-verify="required" placeholder="请输入帐号" autocomplete="off"
                       class="layui-input" style="width: 300px;">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-inline">
                <input type="password" id="password" required lay-verify="required" placeholder="请输入密码"
                       autocomplete="off"
                       class="layui-input" style="width: 300px;">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">验证码</label>
            <div class="layui-inline" style="margin-right: 0;">
                <input type="text" id="code" required lay-verify="required" placeholder="请输入验证码" autocomplete="off"
                       class="layui-input" style="width: 200px;">
            </div>
            <div class="layui-inline">
                <img src="/verify/code" style="padding-left: -150px;width: 100px;height: 37px;">
            </div>
        </div>
        <div class="layui-form-item" style="padding-bottom: 20px; text-align: center">
            <div class="layui-inline">
                <button type="button" class="layui-btn layui-btn-normal" lay-submit lay-filter="login" style="width: 150px;">登录</button>
            </div>
        </div>
    </form>
</div>

<script>
    layui.use('form', function () {
        var form = layui.form;
        var $ = layui.jquery;


        $('div img').click(function (){
            $(this).attr('src', "/verify/code?_r=" + Math.random());
        })

        $('div button').click(function (){
            var email = $("#email").val();
            var password = $("#password").val();
            var code = $("#code").val();

            $.post('/admin/login',
                {
                    email: email,
                    password: hex_md5(password),
                    code: code
                },
                function(data, status){
                    $('div img').attr('src', "/verify/code?_r=" + Math.random());

                    if(data.errcode != 0){
                        layer.msg(data.errmessage, {
                            time: 2000,
                            // offset: 'rt',
                            icon: 5
                        });

                        return;
                    }

                    location.href = "/admin/";
                }
            );
        });
    });
</script>
</body>
</html>