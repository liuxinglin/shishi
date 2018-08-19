@extends('home.master')
@section('content')
    <style>
        .weui-media-box:before {
            border-top: none;
        }
    </style>
    <div class="container order" id="container" style="height: 100%;overflow: scroll">
        <div class="weui-navbar">
            <div class="weui-navbar__item @if(!isset($_GET['order_status']) && !isset($_GET['comment_status'])) weui-bar__item_on @endif all">
                <p>全部</p>
                <p>1</p>
            </div>
            <div class="weui-navbar__item pay @if(isset($_GET['order_status']) && $_GET['order_status'] == 0) weui-bar__item_on @endif" >
                <p>待付款</p>
                <p>0</p>
            </div>
            <div class="weui-navbar__item collect @if(isset($_GET['order_status']) && $_GET['order_status'] == 1) weui-bar__item_on @endif">
                <p>待收货</p>
                <p>0</p>
            </div>
            <div class="weui-navbar__item evaluate @if(isset($_GET['comment_status']) && $_GET['comment_status'] == 0) weui-bar__item_on @endif">
                <p>待评价</p>
                <p>0</p>
            </div>
        </div>
        <div class="weui-tab">
            <div class="weui-tab__panel order-list">
                <div class="weui-panel weui-panel_access" id="all" @if(isset($_GET['order_status']) || isset($_GET['comment_status'])) style="display: none" @endif>
                    <div class="weui-panel__bd">
                        @foreach($orderList as $order)
                        <div class="weui-media-box weui-media-box_appmsg">
                            <div class="weui-media-box__hd">
                                <img class="weui-media-box__thumb" src="{{ $order['product'][0]['preview'] }}" alt="">
                            </div>
                            <div class="weui-media-box__bd">
                                <h4 class="weui-media-box__title">{{ $order['product'][0]['name'] }}</h4>
                                @if($order['order_status'] == 0)
                                    <p class="weui-media-box__desc">
                                        <span>需付款：￥{{ $order['total'] }}</span>
                                        <a href="/orders/details?order_id={{ $order['order_id'] }}">去支付</a>
                                    </p>
                                @elseif($order['order_status'] == 1)
                                    <p class="weui-media-box__desc">
                                        <span>需付款：￥{{ $order['total'] }}</span>
                                        <a href="#">待收货</a>
                                    </p>
                                @elseif(($order['order_status'] == 3) && ($order['comment_status'] == 0))
                                    <p class="weui-media-box__desc">
                                        <span>付款：￥{{ $order['total'] }}</span>
                                        <a href="/comments/create?order_id={{ $order['order_id'] }}">去评价</a>
                                    </p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="weui-panel weui-panel_access" id="pay" @if(!isset($_GET['order_status']) || $_GET['order_status'] != 1) style="display: none" @endif>
                    <div class="weui-panel__bd">
                        @foreach($orderList as $order)
                            @if($order['order_status'] == 0)
                            <div class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="{{ $order['product'][0]['preview'] }}" alt="">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">{{ $order['product'][0]['name'] }}</h4>
                                    <p class="weui-media-box__desc">
                                        <span>需付款：￥{{ $order['total'] }}</span>
                                        <a href="/orders/details?order_id={{ $order['order_id'] }}">去支付</a>
                                    </p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="weui-panel weui-panel_access" id="collect" @if(!isset($_GET['order_status']) || $_GET['order_status'] != 2)style="display: none"@endif>
                    <div class="weui-panel__bd">
                        @foreach($orderList as $order)
                            @if($order['order_status'] == 2)
                            <div class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="{{ $order['product'][0]['preview'] }}" alt="">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">{{ $order['product'][0]['name'] }}</h4>
                                    <p class="weui-media-box__desc">
                                        <span>付款：￥{{ $order['total'] }}</span>
                                        <a href="#">待收货</a>
                                    </p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="weui-panel weui-panel_access" id="evaluate" @if(!isset($_GET['comment_status']) || $_GET['comment_status'] != 0)style="display: none"@endif>
                    <div class="weui-panel__bd">
                        @foreach($orderList as $order)
                            @if(($order['is_comment'] == 0) && ($order['order_status'] == 3))
                            <div class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="{{ $order['product'][0]['preview'] }}" alt="">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">{{ $order['product'][0]['name'] }}</h4>
                                    <p class="weui-media-box__desc">
                                        <span>付款：￥{{ $order['total'] }}</span>
                                        <a href="/comments/create?order_id={{ $order['order_id'] }}">去评价</a>
                                    </p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('my-js')
    <script type="text/javascript">
        $(function(){
            $('.weui-navbar__item').on('click', function () {
                $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
                if($(this).hasClass('all')) {
                    $('#pay').css('display', 'none');
                    $('#collect').css('display', 'none');
                    $('#evaluate').css('display', 'none');
                    $('#all').css('display', 'block');
                }
                if($(this).hasClass('pay')) {
                    $('#all').css('display', 'none');
                    $('#collect').css('display', 'none');
                    $('#evaluate').css('display', 'none');
                    $('#pay').css('display', 'block');
                }
                if($(this).hasClass('collect')) {
                    $('#all').css('display', 'none');
                    $('#pay').css('display', 'none');
                    $('#evaluate').css('display', 'none');
                    $('#collect').css('display', 'block');
                }
                if($(this).hasClass('evaluate')) {
                    $('#all').css('display', 'none');
                    $('#collect').css('display', 'none');
                    $('#pay').css('display', 'none');
                    $('#evaluate').css('display', 'block');
                }
            });
        });
    </script>
@endsection
