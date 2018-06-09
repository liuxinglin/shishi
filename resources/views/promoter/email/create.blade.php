@extends('backend.master')
@section('content')
    <div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-header">新增邮件</div>
        <div class="layui-card-body" style="padding: 15px;">
            <div class="layui-form">
                <div class="layui-form-item">
                    <label class="layui-form-label">玩家ID</label>
                    <div class="layui-input-block">
                        <input type="text" name="ToActorIDs" lay-verify="title" autocomplete="off" placeholder="示例：101|102|103" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">邮件类型</label>
                    <div class="layui-input-block">
                        <select name="EMailType" lay-filter="aihao">
                            <option value=""></option>
                            <option value="0">系统奖励</option>
                        </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">邮件标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="EMailTopic" lay-verify="title" autocomplete="off" placeholder="请输入邮件标题" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">邮件内容</label>
                    <div class="layui-input-block">
                        <textarea name="MailContext" placeholder="请输入内容" class="layui-textarea"></textarea>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">附送银子</label>
                    <div class="layui-input-block">
                        <input type="text" name="PlusMoney" lay-verify="title" autocomplete="off" placeholder="附送银子" class="layui-input">
                    </div>
                </div>

                {{--<div class="layui-form-item">--}}
                    {{--<label class="layui-form-label">附送金子</label>--}}
                    {{--<div class="layui-input-block">--}}
                        {{--<input type="text" name="PlusTicket" lay-verify="title" autocomplete="off" placeholder="附送金子" class="layui-input">--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">附送经验</label>
                    <div class="layui-input-block">
                        <input type="text" name="PlusExp" lay-verify="title" autocomplete="off" placeholder="附送经验" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">附送道具</label>
                    <div class="layui-input-block">
                        <input type="text" name="GoodsData" lay-verify="title" autocomplete="off" placeholder="请输入道具信息" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">道具数目</label>
                    <div class="layui-input-block">
                        <input type="text" name="GoodsCount" lay-verify="title" autocomplete="off" placeholder="请输入道具数目" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">是否有附件</label>
                    <div class="layui-input-block">
                        <input type="radio" name="HasPlusData" value="1" title="是" checked="">
                        <input type="radio" name="HasPlusData" value="0" title="否">

                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">邮件有效期</label>
                    <div class="layui-input-block">
                        <input type="text" name="LifeTime" lay-verify="title" value="720" autocomplete="off" placeholder="请输入邮件有效期" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">等级</label>
                        <div class="layui-input-inline" style="width: 100px;">
                            <input type="text" name="grade_min" placeholder="最低" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid">-</div>
                        <div class="layui-input-inline" style="width: 100px;">
                            <input type="text" name="grade_max" placeholder="最高" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}

                <div class="layui-form-item layui-layout-admin">
                    <div class="layui-input-block">
                        <div class="layui-footer" style="left: 0;">
                            <button class="layui-btn" data-url="{{ route('emails.store') }}" lay-submit="" lay-filter="submit">立即提交</button>
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