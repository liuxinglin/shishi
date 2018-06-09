@extends('backend.master')
@section('content')
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
    layui.use('table', function(){
        var table = layui.table
            ,form = layui.form;

        table.render({
            elem: '#test'
            ,url:'{{ route('promoters.index') }}'
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