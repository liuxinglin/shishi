<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="{{ route('prom.main') }}">
            <span>myAdmin</span>
        </div>

        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <li data-name="backend" class="layui-nav-item">
                <a href="javascript:;" lay-tips="主页" lay-direction="2">
                    <i class="layui-icon layui-icon-home"></i>
                    <cite>首页</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd data-name="main" class="layui-this">
                        <a lay-href="{{ route('prom.main') }}">控制台</a>
                    </dd>
                </dl>
            </li>
            <li data-name="get" class="layui-nav-item">
                <a href="javascript:;" lay-href="{{ route('coms_flows.index') }}" lay-tips="推广查询" lay-direction="2">
                    <i class="layui-icon layui-icon-auz"></i>
                    <cite>推广查询</cite>
                </a>
            </li>
        </ul>
    </div>
</div>