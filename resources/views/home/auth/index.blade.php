@extends('home.master')
@section('content')
    <div class="container auth" id="container">
        <div class="weui-media-box weui-media-box_text logo">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="/static/home/images/logo.png" alt="">
            </div>
        </div>

        <div class="choice">
            <button class="login">登录</button>
            <button class="register">注册</button>
        </div>
    </div>
@endsection
@section('my-js')
    <script type="application/javascript" src="/static/layer_mobile/layer.js"></script>
    <link rel="stylesheet" href="/static/home/css/layer.css"/>
    <script type="application/javascript">
        $('.login').click(function () {
            layer.open({
                style: 'color:#333;text-align:left;font-size:14px;position:relative;width:80%',
                title: [
                    '登录',
                    'background-color: #F2F2F2; color:#000; height:52px'
                ],
                content: '<div class="phone">手机号<input name="phone" type="text" placeholder="请输入您的手机号" /></div>' +
                '<div class="phone">密码 <input name="password" type="text" placeholder="请输入密码" /></div>',
                success: function(elem){
                    $(".layui-m-layercont").css({"text-align":"left", "padding":"10px 0px", "overflow":"auto", "height":"110px"});
                    $(".layui-m-layercont input").css({"border":"none", "padding":"0px 10px", "height":"20px", "width": "118px", "outline":"none"});
                    $(".layui-m-layercont .phone").css({"border-bottom":"1px solid #E5E5E5"});
                    $(".verify_code, .phone").css({"padding":"15px"});
                    $(".phone button").css({"background": "url(/static/home/images/btn_Verification-Code.png) no-repeat;",
                        "background-size": "100% 100%", "border": "none", "height": "25px", "width": "90px", "font-size": "13px",
                        "line-height": "20px", "color": "#FFFFFF"});
                    $(".layui-m-layerbtn span[yes]").css({"background-color":"red", "color":"#ffffff"});
                },
                btn: ['立即登录', '取消'],
                yes: function(index){
                    var phone = $("input[ name='phone']").val();
                    var password = $("input[ name='password']").val();
                    var url = '/auth/login';
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {'phone': phone, 'password': password, '_token': '{{ csrf_token() }}'},
                        success: function (rst) {
                            console.log(rst);
                            if(rst.status == false) {
                                layer.open({
                                    content: rst.msg
                                    ,skin: 'msg'
                                    ,time: 2 //2秒后自动关闭
                                    ,type: 1
                                });
                                return false;
                            } else  {
                                layer.open({
                                    content: rst.msg
                                    ,skin: 'msg'
                                    ,time: 2 //2秒后自动关闭
                                })

                                window.location.href = '/tryoutProducts/list';
                            }
                        }
                    })
                }
            });
        })

        $('.register').click(function () {
            layer.open({
                style: 'color:#333;text-align:left;font-size:14px;position:relative;width:80%',
                title: [
                    '注册',
                    'background-color: #F2F2F2; color:#000; height:52px'
                ],
                content: '<div class="phone">手机号<input name="phone" type="text" placeholder="请输入您的手机号" /></div>' +
                '<div class="phone">密码 <input name="password" type="text" placeholder="请输入密码" /></div>',
                success: function(elem){
                    $(".layui-m-layercont").css({"text-align":"left", "padding":"10px 0px", "overflow":"auto", "height":"110px"});
                    $(".layui-m-layercont input").css({"border":"none", "padding":"0px 10px", "height":"20px", "width": "118px", "outline":"none"});
                    $(".layui-m-layercont .phone").css({"border-bottom":"1px solid #E5E5E5"});
                    $(".verify_code, .phone").css({"padding":"15px"});
                    $(".phone button").css({"background": "url(/static/home/images/btn_Verification-Code.png) no-repeat;",
                        "background-size": "100% 100%", "border": "none", "height": "25px", "width": "90px", "font-size": "13px",
                        "line-height": "20px", "color": "#FFFFFF"});
                    $(".layui-m-layerbtn span[yes]").css({"background-color":"red", "color":"#ffffff"});
                },
                btn: ['立即注册', '取消'],
                yes: function(index){
                    var phone = $("input[ name='phone']").val();
                    var password = $("input[ name='password']").val();
                    var url = '/auth/register';
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {'phone': phone, 'password': password, '_token': '{{ csrf_token() }}'},
                        success: function (rst) {
                            console.log(rst);
                            if(rst.code != 0) {
                                layer.open({
                                    content: rst.msg
                                    ,skin: 'msg'
                                    ,time: 2 //2秒后自动关闭
                                    ,type: 1
                                });
                                return false;
                            } else  {
                                layer.open({
                                    content: rst.msg
                                    ,skin: 'msg'
                                    ,time: 2 //2秒后自动关闭
                                })
                            }
                        }
                    })
                }
            });
        })
    </script>
@endsection
