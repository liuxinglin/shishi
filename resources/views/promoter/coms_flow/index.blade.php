@extends('backend.master')
@section('content')
    <blockquote class="layui-elem-quote">
        <div class="layui-form-item">
            <div class="layui-input-inline">
                <input type="text" name="username" required lay-verify="required" placeholder="请输输入游戏用户名" autocomplete="off" class="layui-input">
            </div>
            <button class="layui-btn search">查询</button>
        </div>
    </blockquote>
    <table class="layui-hide" id="test"></table>
@endsection
@section('my-js')
    <script type="text/html" id="statusTpl">
        @{{ d.status == 1 ? '启用' : '禁用' }}
    </script>

    <script type="text/html" id="createdTpl">
        @{{ layui.laytpl.toDateString(d.created_at) }}
    </script>
    <script>
    layui.use(['jquery','table'], function(){
        var table = layui.table
            ,form = layui.form
            ,$ = layui.$;
        $('.search').on('click', function () {
            var username = $(" input[ name='username' ] ").val();
            table.render({
                elem: '#test'
                ,url:'{{ route('comsFlows.index') }}'
                ,where: {username: username}
                ,cellMinWidth: 80
                ,cols: [[
                    {type:'numbers'}
                    ,{type: 'checkbox'}
                    ,{field:'id', title:'ID', width:100, unresize: true, sort: true}
                    ,{field:'username', title:'用户名', templet: '#usernameTpl'}
                    ,{field:'nickname', title:'昵称'}
                    ,{field:'code', title:'推广码'}
                    ,{field:'commission', title:'累积佣金'}
                    ,{field:'phone', title:'手机号码'}
                    ,{field:'created_at', title:'注册时间', templet: '#createdTpl', unresize: true}
                    ,{field:'status', title:'状态', templet: '#statusTpl', unresize: true}
                ]]
                ,page: true
            });
        })


        //监听性别操作
        form.on('switch(sexDemo)', function(obj){
            layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
        });

        //监听锁定操作
        form.on('checkbox(lockDemo)', function(obj){
            layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
        });
    });
</script>
@endsection