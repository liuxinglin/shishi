@extends('home.master')
@section('content')
    <div class="container member" id="container">
        <div class="page__bd">
            <div class="weui-cells weui-cells_form" style="margin-top: 0px">
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">姓名：</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" value="{{ $memberAddress['contacts'] }}" type="text" name="contacts" placeholder="请输入姓名"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">联系电话</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" value="{{ $memberAddress['phone'] }}" type="text" name="phone" placeholder="请输入联系电话"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">所在地区</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" value="{{ $memberAddress['area'] }}" type="text" name="area" placeholder="请输入所在地区"/>
                    </div>
                </div>
                {{--<div class="weui-cell weui-cell_select weui-cell_select-after">--}}
                    {{--<div class="weui-cell__hd">--}}
                        {{--<label for="" class="weui-label">国家/地区</label>--}}
                    {{--</div>--}}
                    {{--<div class="weui-cell__bd">--}}
                        {{--<select class="weui-select" name="select2">--}}
                            {{--<option value="1">中国</option>--}}
                            {{--<option value="2">美国</option>--}}
                            {{--<option value="3">英国</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="weui-cell weui-cell_select weui-cell_select-after">--}}
                    {{--<div class="weui-cell__hd">--}}
                        {{--<label for="" class="weui-label">街道</label>--}}
                    {{--</div>--}}
                    {{--<div class="weui-cell__bd">--}}
                        {{--<select class="weui-select" name="select2">--}}
                            {{--<option value="1" @if($memberAddress[''])>中国</option>--}}
                            {{--<option value="2">美国</option>--}}
                            {{--<option value="3">英国</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="weui-cells weui-cells_form"  style="margin-top: 0px">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <textarea class="weui-textarea" id="address" name="address" placeholder="请输入详细地址，不少于5个字" rows="3">{{ $memberAddress['address'] }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="weui-btn-area">
                <button class="weui-btn weui-btn_primary submit" data-url="/enrolments/add">确定</button>
            </div>
        </div>
    </div>
@endsection
@section('my-js')
    <script type="application/javascript" src="/static/layer_mobile/layer.js"></script>
    <link rel="stylesheet" href="/static/home/css/layer.css"/>
    <script type="application/javascript">
        $('.submit').click(function () {
            var member_id = '{{ session('member.id') }}';
            var contacts = $("input[ name='contacts']").val();
            var phone = $("input[ name='phone']").val();
            var area = $("input[ name='area']").val();
            var address = $('#address').val();
            var tryout_id = '{{ $_GET['tryout_id'] or '' }}';
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'POST',
                url: url,
                data: {'member_id': member_id, 'tryout_id': tryout_id, 'phone': phone, 'contacts': contacts, 'address': address, 'area': area, '_token': '{{ csrf_token() }}'},
                success: function (rst) {
                    if(rst.status == false) {
                        if(rst.code == 1) {
                            layer.open({
                                content: rst.msg
                                ,skin: 'msg'
                                ,time: 2 //2秒后自动关闭
                            });
                            window.location.href = '/enrolments/details?member_id='+member_id+'&tryout_id='+tryout_id;
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
                    var member_id = '{{ session('member.id') }}';
                    var url = '/members/bindPhone';
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {'member_id': member_id, 'phone': phone, 'varify_code': varify_code, '_token': '{{ csrf_token() }}'},
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
                            }
                        }
                    })
                }
            });
        }
    </script>
@endsection
