<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cms</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/layui/layui.js"></script>
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo layui-hide-xs layui-bg-black">cms</div>

        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item layui-hide layui-show-md-inline-block">
                <a href="javascript:;">
                    <img src="//tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" class="layui-nav-img">
                    <span id="user-email">guest</span>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="/admin/logout">登出</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">栏目列表</a>
                    <dl class="layui-nav-child">
                        <?php
                        foreach($category_list as $cat){
                            if($cat->id == $cat_id){
                                echo sprintf('<dd><a href="/admin?cat=%d" class="layui-this">%s</a></dd>', $cat->id, $cat->name);
                            }else{
                                echo sprintf('<dd><a href="/admin?cat=%d">%s</a></dd>', $cat->id, $cat->name);
                            }
                        }
                        ?>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        @section('main')
        @show
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
    </div>
</div>

<script>
    cat_id = {{ $cat_id }};
    //JS
    layui.use(['element', 'layer', 'util'], function(){
        var element = layui.element
            ,layer = layui.layer
            ,util = layui.util
            ,$ = layui.$;

        $(function (){
            // 个人信息
            $.get('/admin/self/user/info', function (data){
                if(data.errcode != 0){
                    layer.msg(data.errmessage, {
                        time: 2000,
                        offset: 'rt',
                        icon: 5
                    });
                    return;
                }

                $('#user-email').html(data.data.user.email);

            });
        });
    });

</script>
</body>
</html>