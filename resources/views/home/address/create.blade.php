@extends('home.master')
@section('content')
    <div class="container member" id="container">
        <div class="page__bd">
            <div class="weui-cells weui-cells_form" style="margin-top: 0px">
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">收货人</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="contacts" placeholder="请输入收货人姓名"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">联系电话</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="phone" placeholder="请输入收货人联系电话"/>
                    </div>
                </div>
                <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">国家/地区</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="select2">
                            <option value="1">中国</option>
                            <option value="2">美国</option>
                            <option value="3">英国</option>
                        </select>
                    </div>
                </div>
                <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">街道</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="select2">
                            <option value="1">中国</option>
                            <option value="2">美国</option>
                            <option value="3">英国</option>
                        </select>
                    </div>
                </div>
                <div class="weui-cells weui-cells_form"  style="margin-top: 0px">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <textarea class="weui-textarea" id="address" name="address" placeholder="请输入详细地址，不少于5个字" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="weui-cells weui-cells_form">
                <div class="weui-cell weui-cell_switch">
                    <div class="weui-cell__bd">设为默认</div>
                    <div class="weui-cell__ft">
                        <label for="switchCP" class="weui-switch-cp">
                            <input id="switchCP" class="weui-switch-cp__input" value="1" name="is_default" type="checkbox" checked="checked"/>
                            <div class="weui-switch-cp__box"></div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="weui-btn-area">
                <button class="weui-btn weui-btn_primary submit" data-url="/address/add">确定</button>
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
            var address = $('#address').val();
            var is_default = $('input[name=is_default]:checked').val();
            alert(is_default);
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'POST',
                url: url,
                data: {'member_id': member_id, 'phone': phone, 'contacts': contacts, 'address': address, 'is_default': is_default, '_token': '{{ csrf_token() }}'},
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
        })
    </script>
@endsection
