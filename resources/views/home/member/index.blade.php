@extends('home.master')
@section('content')
    <div class="container member" id="container">
        <div class="weui-media-box weui-media-box_text info">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="{{ $member['headimgurl'] }}" alt="">
            </div>
            <h4 class="weui-media-box__title nickname">{{ $member['nickname'] }}</h4>
            <p class="weui-media-box__desc auth">已认证</p>
        </div>

        <div class="weui-panel weui-panel_access order-panel">
            <a href="/orders/index" class="weui-cell weui-cell_access weui-cell_link">
                <div class="weui-cell__bd">我的订单</div>
                <span class="weui-cell__ft">查看更多</span>
            </a>
            <div class="weui-panel__bd">
                <div class="weui-media-box weui-media-box_appmsg">
                    <a class="weui-media-box__bd" href="/orders/index?order_status=0">
                        <img class="weui-media-box__thumb" src="/static/home/images/btn_info_notpay.png" alt="">
                        <p>待付款</p>
                    </a>
                    <div class="weui-media-box__bd"></div>
                    <a class="weui-media-box__bd"  href="/orders/index?order_status=2">
                        <img class="weui-media-box__thumb" src="/static/home/images/btn_info_notget.png" alt="">
                        <p>待收货</p>
                    </a>
                    <div class="weui-media-box__bd"></div>
                    <a class="weui-media-box__bd"  href="/orders/index?comment_status=0">
                        <img class="weui-media-box__thumb" src="/static/home/images/btn_info_nojudge.png" alt="">
                        <p>待评价</p>
                    </a>
                </div>
                <div class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__bd">
                        <img class="weui-media-box__thumb" src="/static/home/images/btn_info_off.png" alt="">
                        <p>优惠资格</p>
                    </div>
                    <div class="weui-media-box__bd"></div>
                    <div class="weui-media-box__bd">
                        <img class="weui-media-box__thumb" src="/static/home/images/btn_info_like.png" alt="">
                        <p>我的收藏</p>
                    </div>
                    <div class="weui-media-box__bd"></div>
                    <div class="weui-media-box__bd">
                        <img class="weui-media-box__thumb" src="/static/home/images/btn_info_aftersale.png" alt="">
                        <p>售后</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="weui-panel tool">
            <div class="weui-panel__bd">
                <div class="weui-media-box weui-media-box_small-appmsg">
                    <div class="weui-cells">
                        <a class="weui-cell weui-cell_access" href="/address/create">
                            <div class="weui-cell__hd"><img src="/static/home/images/img_ad.png" alt=""></div>
                            <div class="weui-cell__bd weui-cell_primary">
                                <p>添加收货地址</p>
                            </div>
                            <span class="weui-cell__ft"></span>
                        </a>
                        <a class="weui-cell weui-cell_access" href="javascript:;">
                            <div class="weui-cell__hd"><img src="/static/home/images/img_kefu.png" alt=""></div>
                            <div class="weui-cell__bd weui-cell_primary">
                                <p>官方客服</p>
                            </div>
                            <span class="weui-cell__ft"></span>
                        </a>
                        <a class="weui-cell weui-cell_access" href="/comments/index?member_id={{ $member['id'] }}">
                            <div class="weui-cell__hd"><img src="/static/home/images/img_pingjia.png" alt=""></div>
                            <div class="weui-cell__bd weui-cell_primary">
                                <p>我的评价</p>
                            </div>
                            <span class="weui-cell__ft"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('home.footer')
    </div>
@endsection
@section('my-js')
@endsection
