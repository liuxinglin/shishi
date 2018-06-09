<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登入 - myAdmin</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/backend/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/backend/style/admin.css" media="all">
    <link rel="stylesheet" href="/static/backend/style/login.css" media="all">
</head>
<body>

<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>myAdmin</h2>
            <p>推广员系统</p>
        </div>
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                <input type="text" name="username" id="LAY-user-login-username" lay-verify="username" placeholder="用户名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                <input type="password" name="password" id="LAY-user-login-password" lay-verify="password" placeholder="密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <div class="layui-row">
                    <div class="layui-col-xs7">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                        <input type="text" name="vercode" id="LAY-user-login-vercode" lay-verify="vercode" placeholder="图形验证码" class="layui-input">
                    </div>
                    <div class="layui-col-xs5">
                        <div style="margin-left: 10px;">
                            <img src="https://www.oschina.net/action/user/captcha" class="layadmin-user-login-codeimg" id="LAY-user-get-vercode">
                        </div>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
            <div class="layui-form-item" style="margin-bottom: 20px;">
                <input type="checkbox" name="remember" lay-skin="primary" title="记住密码">
                <a href="forget.html" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" data-url="{{ route('prom.login') }}" lay-submit=""  lay-filter="submit">登 入</button>
            </div>
            <div class="layui-trans layui-form-item layadmin-user-login-other">
                <label>社交账号登入</label>
                <a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>
                <a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>
                <a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>

                <a href="reg.html" class="layadmin-user-jump-change layadmin-link">注册帐号</a>
            </div>
        </div>
    </div>

    <div class="layui-trans layadmin-user-login-footer">

        <p>© 2018 <a href="#" target="_blank">myAdmin.com</a></p>
        {{--<p>--}}
            {{--<span><a href="#" target="_blank">获取授权</a></span>--}}
            {{--<span><a href="#" target="_blank">在线演示</a></span>--}}
            {{--<span><a href="#" target="_blank">前往官网</a></span>--}}
        {{--</p>--}}
    </div>


</div>

<script src="/static/backend/layui/layui.js"></script>
<script>
    layui.use(['form', 'layer'], function () {
        var $ = layui.jquery,form = layui.form,layer = layui.layer;
//        form.verify({
//            username: function(value, item){ //value：表单的值、item：表单的DOM对象
//                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
//                    return '用户名不能有特殊字符';
//                }
//                if(/(^\_)|(\__)|(\_+$)/.test(value)){
//                    return '用户名首尾不能出现下划线\'_\'';
//                }
//                if(/^\d+\d+\d$/.test(value)){
//                    return '用户名不能全为数字';
//                }
//            }
//
//            //我们既支持上述函数式的方式，也支持下述数组的形式
//            //数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
//            ,password: [
//                /^[\S]{6,12}$/
//                ,'密码必须6到12位，且不能出现空格'
//            ]
//            ,vercode: function (value) {
//                if (value == "") {
//                    return "请输入验证码";
//                }
//            }
//        });

        // 提交监听
        form.on('submit(submit)', function (obj) {
            console.log(obj.field);
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'POST',
                url: url,
                data: obj.field,
                beforeSubmit: function () {
                    layer.load(); //loading层
                },
                success: function (rst) {
                    if(rst.code != 0) {
                        layer.msg(rst.msg, {icon: 2, time: 2000});
                        return false;
                    }
                    layer.msg(rst.msg, {icon: 1, time: 2000});
                    setTimeout(function () {
                        window.location.href = rst.data.url;
                    }, 2000);
                }
            })
        })
    })
</script>
</body>
</html>
