<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="帐号注册" />
    <meta name="description" content="帐号注册" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改密码</title>
    <link rel="stylesheet" href="/static/game/css/reset.css"/>
    <link rel="stylesheet" href="/static/game/css/global.css"/>
    <link rel="stylesheet" href="/static/game/css/component.css"/>
    <link rel="stylesheet" href="/static/game/css/login.css"/>
    <script src="/static/game/js/jquery-1.8.2.min.js"></script>
    <script src="/static/game/js/jquery.cookie.js"></script>
    <script src="/static/game/js/jquery.validate.js"></script>
    <script src="/static/game/js/jquery.metadata.js"></script>
    <script src="/static/game/js/jquery.validate.message_cn.js"></script>
    <script src="/static/game/js/jquery.nicescroll.min.js"></script>
    <script src="/static/game/js/mgTextWidth.js"></script>
    <script src="/static/game/js/tinybox.js"></script>
    <script src="/static/game/js/components.js"></script>

    <script>
        $(document).ready(function(){
            if ($.browser.msie && ( ($.browser.version == "6.0") || ($.browser.version == "7.0") ) && !$.support.style) {
                $('.IE_alert').show();
            }else{
                $('.login_form').fadeIn();
            }
        });

        var destPage = null;

        var pageType = null;
    </script>
    </head>

    <body scroll="no">

        <div id="login_wrapper">
        <div id="login_main">

        <div class="IE_alert">
        <p>很遗憾，您的浏览器过于古老，暂时无法使用</p>
    <p class="suggestBrowser">我们建议您使用 <a href="http://www.google.cn/intl/zh-CN/chrome/browser/?installdataindex=chinabookmarkcontrol&brand=CHUN">谷歌浏览器</a>，或 <a href="http://windows.microsoft.com/zh-CN/internet-explorer/download-ie">更高版本的IE浏览器</a> </p>
        </div>

        <div class="login_form">
        <div class="login_form_header">
        <p class="p_login login_active">修改密码</p>
        <!-- 				<p class="p_register"><span class="img_register"></span>修改密码</p> -->
        <div class="clearB"></div>
        </div>
        <form class="login_items" id="login_items">
        <label class="input_val"><input class="input" name="m_name" value="" autocomplete="off" /><span>用户名</span></label>
        <label class="input_val"><input class="input" name="pwd" type="password" id="login_password" autocomplete="off" /><span>原密码</span><img src="/static/game/images/login_password.png" /></label>
        <label class="input_val"><input class="input" name="newpwd" type="password" id="login_password" autocomplete="off" /><span>新密码</span><img src="/static/game/images/login_password.png" /></label>
        <label class="input_val"><input class="input" name="renewpwd" type="password" id="login_password" autocomplete="off" /><span>再次输入密码</span><img src="/static/game/images/login_password.png" /></label>
            <label class="input_val"><input class="input" name="email" value="" autocomplete="off" /><span>邮箱</span></label>

        <div class="clearB"></div>
        <div class="remeber" style="height: 20px">
        <a id="forgetPassword" href="/game/register" style="float: right;">帐号注册</a>
        </div>
        <a class="login_btn modify">确&nbsp;&nbsp;认&nbsp;&nbsp;修&nbsp;&nbsp;改</a>
    </form>

    </div>
    <!--
    <p class="contactUs">联系我们：http://www.sucaihuo.com/</p> -->
        </div>
    </div>
        <script>

        $(document).on('click','.modify', function () {
            var m_username = $("input[name='m_name']").val();
            var password = $("input[name='pwd']").val();
            var newpwd = $("input[name='newpwd']").val();
            var renewpwd = $("input[name='renewpwd']").val();
            var email = $("input[name='email']").val();
            if(m_username == '') {
                alert('用户名不能为空');
                return false;
            }

            if(password == '') {
                alert('原密码不能为空');
                return false;
            }
            if(newpwd == '') {
                alert('新密码不能为空');
                return false;
            }
            if(renewpwd != newpwd) {
                alert('两次输入的新密码不一致');
                return false;
            }
            $.ajax({
                type: 'POST',
                url: '/game/modifyPwd',
                data: {username:m_username, password:password, renewpwd:renewpwd, newpwd:newpwd, email:email '_token': '{{ csrf_token() }}'},
                success: function (rst) {
                    console.log(rst);
                    if(rst.code != 0) {
                        alert(rst.msg);
                        return false;
                    }
                    alert(rst.msg);
                },
            });
        });
    </script>


    </body>
</html>
