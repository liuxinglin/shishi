@extends('backend.master')
@section('content')
    <div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-header">添加推广员</div>
        <div class="layui-card-body" style="padding: 15px;">
            <div class="layui-form">
                <div class="layui-form-item">
                    <label class="layui-form-label">推广员账号</label>
                    <div class="layui-input-block">
                        <input type="text" name="username" lay-verify="title" autocomplete="off" placeholder="推广员账号" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="password" lay-verify="title" autocomplete="off" placeholder="请输入密码" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">昵称</label>
                    <div class="layui-input-block">
                        <input type="text" name="nickname" lay-verify="title" autocomplete="off" placeholder="请输入昵称" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">推广码</label>
                    <div class="layui-input-block">
                        <input type="text" name="code" lay-verify="title" autocomplete="off" placeholder="推广员游戏ID" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">手机号码</label>
                    <div class="layui-input-block">
                        <input type="text" name="phone" lay-verify="title" autocomplete="off" placeholder="手机号码" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <input type="radio" name="status" value="1" title="启用" checked="">
                        <input type="radio" name="status" value="0" title="禁用">
                    </div>
                </div>
                {{ csrf_field() }}

                <div class="layui-form-item layui-layout-admin">
                    <div class="layui-input-block">
                        <div class="layui-footer" style="left: 0;">
                            <button class="layui-btn" data-url="{{ route('promoters.store') }}" lay-submit="" lay-filter="submit">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('my-js')
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
                            window.location.reload();
                        }, 2000);
                    }
                })
            })
        })
    </script>
@endsection