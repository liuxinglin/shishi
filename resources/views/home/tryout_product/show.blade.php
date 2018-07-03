@extends('home.master')
@section('content')
    <div class="container" id="container">
        <div class="weui-panel weui-panel_access product-details" style="margin-top: 0px;">
            <div class="weui-panel__bd">
                <div class="weui-media-box" style="padding: 0px">
                    <img src="/static/home/images/procuct_show.png" class="preview">
                </div>
                <div class="weui-media-box weui-media-box_text" style="padding: 2vw 3vw 0">
                    <div class="weui-media-box free" style="padding: 0px;overflow: hidden">
                        <div class="weui-media-box__hd">
                            <p>免费</p>
                        </div>
                        <div class="weui-media-box__bd">
                            <p>免费试用资格抢购中</p>
                        </div>
                    </div>
                    <h4 class="weui-media-box__title">{{ $data['name'] }}</h4>
                </div>

                <div class="weui-media-box weui-media-box_text sign-info">
                    <div class="weui-media-box">
                        <div class="weui-media-box__hd">
                            <img src="/static/home/images/img_goodstab2.png">
                        </div>
                        <div class="weui-media-box__bd">
                            <p class="countdown">剩余时间   <span id="time"></span></p>
                        </div>
                    </div>
                    <div class="product-promise">
                        <p><span></span>全场包邮</p>
                        <p><span></span>7天退换</p>
                        <p><span></span>48小时发货</p>
                        <p><span></span>假一赔十</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="weui-panel signup-list">
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                    <div class="weui-cell__bd">{{ $data['enrolments']['total'] }}人正在抢购，可直接参</div>
                    <span class="weui-cell__ft">查看更多</span>
                </a>
            </div>
            <div class="weui-panel__bd">
                @foreach($data['enrolments']['list'] as $value)
                <div class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">{{ $value['nickname'] }}</h4>
                    </div>
                    <div class="weui-media-box__ft">
                        <p class="weui-media-box__desc">已获得票数：<span>{{ $value['votes_num'] }}</span></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="weui-panel comment">
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                    <div class="weui-cell__bd">用户使用评论（{{ $data['comments']['total'] }}）</div>
                    <span class="weui-cell__ft">查看更多</span>
                </a>
            </div>
            <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
                @foreach($data['comments']['list'] as $value)
                <div class="weui-media-box weui-media-box_text" style="border-bottom: 1px solid #E5E5E5">
                    <div class="user-info">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">{{ $value['nickname'] }}</h4>
                        </div>
                        <div class="weui-media-box__ft">
                            <p class="weui-media-box__desc">{{ $value['created_at'] }}</p>
                        </div>
                    </div>
                    <p class="weui-media-box__desc content" >{{ $value['content'] }}</p>
                    <ul class="weui-media-box__info">
                        <li class="weui-media-box__info__meta">文字来源</li>
                        <li class="weui-media-box__info__meta">时间</li>
                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">其它信息</li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
        <div class="weui-panel product-content">
            <div class="weui-panel__bd">商品详情</div>
            <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
                <div class="weui-media-box weui-media-box_text">
                    {{ $data['description'] }}
                </div>
            </div>
        </div>
        <div class="weui-tabbar tool-bar">
            <a href="javascript:;" class="weui-tabbar__item weui-bar__item_on collection">
                <span style="display: inline-block;position: relative;">
                    <img src="/static/home/images/btn_like.png" alt="" class="weui-tabbar__icon">
                </span>
               <p class="weui-tabbar__label" style="color: #FF564C">收藏</p>
            </a>
            <a href="javascript:;" class="weui-tabbar__item active">
                <img src="/static/home/images/btn_goods.png" alt="" class="weui-tabbar__icon">
                <p class="weui-tabbar__label">活动详情</p>
            </a>

            <a href="javascript:;" data-url="/enrolments/add" class="weui-tabbar__item signup">
                <p class="weui-tabbar__label">我要报名</p>
            </a>
        </div>
    </div>
@endsection
@section('my-js')
    <script type="application/javascript" src="/static/home/js/downCount.js"></script>
    <script type="application/javascript" src="/static/layer_mobile/layer.js"></script>
    <link rel="stylesheet" href="/static/home/css/layer.css"/>
    <script type="application/javascript">
        $('.countdown').downCount({
            date: '{{ date('Y/m/d H:i:s', $data['end_date']) }}'
        }, function (){
            container.find('#time').text('报名已结束！');
        });

        $('.signup').click(function () {
            var member_id = '{{ session('member.id') }}';
            var tryout_id = '{{ $data['id'] }}';
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'POST',
                url: url,
                data: {'member_id': member_id, 'tryout_id': tryout_id, '_token': '{{ csrf_token() }}'},
                success: function (rst) {
                    if(rst.status == false) {
                        if(rst.code == 1) {
                            layer.open({
                                content: rst.msg
                                ,skin: 'msg'
                                ,time: 2 //2秒后自动关闭
                            });
                            window.location.href = '/enrolments/details?member_id='+member_id+'tryout_id='+tryout_id;
                            return false;
                        }
                        if(rst.code == 2) {
                            layer.open({
                                style: 'color:#333;text-align:left;font-size:14px;position:relative;width:80%',
                                content: '<div class="enrol-success"><h4>您还未绑定手机号码！</h4><p>只要一步，马上绑定手机号码拿免费商品！</p></div>',
                                success: function(elem){
                                    $(".layui-m-layercont").css({"text-align":"left", "padding":"30px 20px 0px", "overflow":"auto", "height":"110px"});
                                    $('.enrol-success').css({'background-color': '#F2F2F2', 'border-radius': '6px', 'padding': '7px 7px 20px', 'font-size': '13px', 'line-height': '19px'});
                                    $('.enrol-success h4').css({'font-size': '16px', 'line-height': '30px', 'text-align': 'center'});
                                    $('.layui-m-layerbtn').css({'background-color': 'red', 'width': '84%', 'margin-left': '8%', 'margin-bottom': '10px', 'color': '#ffffff', 'height': '45px', 'line-height': '45px'});
                                    $('.layui-m-layerbtn, .layui-m-layerbtn span').css({'border-radius': '5px'});
                                    $('.layui-m-layerbtn span[yes]').css({'color': '#ffffff', 'font-weight': '800', 'font-size': '16px'});
                                    $('.layui-m-layerchild').append('<div class="layer-close yes">X</div>');
                                    $('.layer-close').click(function () {
                                        layer.closeAll();
                                    })
                                },
                                btn: ['立即绑定'],
                                yes: function(index){
                                    //layer.close(index);
                                    bindPhone()
                                }
                            });
                            return false;
                        }
                        layer.open({
                            content: rst.msg
                            ,skin: 'msg'
                            ,time: 2 //2秒后自动关闭
                        });
                        return false;
                    }
                    layer.open({
                        style: 'color:#333;text-align:left;font-size:14px;position:relative;width:80%',
                        content: '<div class="enrol-success"><h4>您已经报名成功！</h4><p>为了能保证获得免费试用的资格，请邀请您的朋友为您投票吧！</p></div>',
                        success: function(elem){
                            $(".layui-m-layercont").css({"text-align":"left", "padding":"30px 20px 0px", "overflow":"auto", "height":"110px"});
                            $('.enrol-success').css({'background-color': '#F2F2F2', 'border-radius': '6px', 'padding': '7px 7px 20px', 'font-size': '13px', 'line-height': '19px'});
                            $('.enrol-success h4').css({'font-size': '16px', 'line-height': '30px', 'text-align': 'center'});
                            $('.layui-m-layerbtn').css({'background-color': 'red', 'width': '84%', 'margin-left': '8%', 'margin-bottom': '10px', 'color': '#ffffff', 'height': '45px', 'line-height': '45px'});
                            $('.layui-m-layerbtn, .layui-m-layerbtn span').css({'border-radius': '5px'});
                            $('.layui-m-layerbtn span[yes]').css({'color': '#ffffff', 'font-weight': '800', 'font-size': '16px'});
                            $('.layui-m-layerchild').append('<div class="layer-close yes">X</div>');
                            $('.layer-close').click(function () {
                                layer.closeAll();
                                window.location.href = '/enrolments/details?id='+rst.data.id;
                            })
                        },
                        btn: ['确 定'],
                        yes: function(index){
                            layer.close(index);
                            window.location.href = '/enrolments/details?id='+rst.data.id;
                        }
                    });
                }
            })
        })
        function bindPhone() {
            layer.open({
                style: 'color:#333;text-align:left;font-size:14px;position:relative;width:80%',
                title: [
                    '绑定手机',
                    'background-color: #F2F2F2; color:#000; height:52px'
                ],
                content: '<div class="phone">手机号<input name="phone" type="text" placeholder="请输入您的手机号" /><button>获取验证码</button></div>' +
                '<div class="verify_code">验证码 <input name="verify_code" type="text" placeholder="请输入验证码" /></div>',
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
                btn: ['立即绑定', '取消'],
                yes: function(index){
                    var phone = $("input[ name='phone']").val();
                    var varify_code = $("input[ name='verify_code']").val();
                    var member_id = 1;
                    var url = '/members/bindPhone';
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {'member_id': member_id, 'phone': phone, 'varify_code': 'varify_code', '_token': '{{ csrf_token() }}'},
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
        }
    </script>
@endsection