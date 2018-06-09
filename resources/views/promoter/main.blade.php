@extends('promoter.master')
@section('content')
    <div class="layui-fluid">
        <blockquote class="layui-elem-quote">推广连接</blockquote>
        <div class="layui-card">
            <div class="layui-card-header" style="font-weight: 800">您的个人专属推广宣传链接为：</div>
            <div class="layui-card-body">
                <p>{{ route('game.to_reg')."?channel=".$promInfo['code'] }}</p>
            </div>
        </div>
    </div>
@endsection
