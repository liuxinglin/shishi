@extends('home.master')
@section('content')
    <div class="container product" id="container">
        <div class="weui-panel weui-panel_access product-details" style="margin-top: 0px;">
            <div class="weui-panel__bd">
                <div class="weui-media-box" style="padding: 0px">
                    <img src="/static/home/images/procuct_show.png" class="preview">
                </div>
                <div class="weui-media-box weui-media-box_text" style="padding: 2vw 3vw 0">
                    <div class="weui-media-box" style="padding: 0px;overflow: hidden">
                        <div class="weui-media-box__hd price">
                            <p>￥{{ $data['price'] }}</p>
                        </div>
                        <div class="weui-media-box__bd" style="color: #999999;text-align: right;line-height: 9vw">
                            <p>已售58件</p>
                        </div>
                    </div>
                    <h4 class="weui-media-box__title">{{ $data['name'] }}</h4>
                </div>

                <div class="weui-media-box weui-media-box_text  sign-info">
                    <div class="weui-media-box">
                        <div class="weui-media-box__hd">
                            <p>品牌清仓</p>
                        </div>
                        <div class="weui-media-box__bd">
                            <p>放心品质，低价清仓</p>
                        </div>
                    </div>
                    <div class="product-promise">
                        <p><span></span>全场包邮</p>
                        <p><span></span>7天退换</p>
                        <p><span></span>48小时发货</p>
                        <p><span></span>假一赔十</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="weui-panel comment">
            <div class="weui-panel__bd">
                <a href="/comments/index?product_id={{ $data['id'] }}" class="weui-cell weui-cell_access weui-cell_link">
                    <div class="weui-cell__bd">用户使用评论（{{ $data['comments']['total'] }}）</div>
                    <span class="weui-cell__ft">查看更多</span>
                </a>
            </div>
            <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
                @foreach($data['comments']['list'] as $value)
                    <div class="weui-media-box weui-media-box_text" style="border-bottom: 1px solid #E5E5E5">
                        <div class="user-info">
                            <div class="weui-media-box__hd">
                                <img class="weui-media-box__thumb" src="{{ $value['headimgurl'] }}" alt="">
                            </div>
                            <div class="weui-media-box__bd">
                                <h4 class="weui-media-box__title">{{ $value['nickname'] }}</h4>
                            </div>
                            <div class="weui-media-box__ft">
                                <p class="weui-media-box__desc">{{ $value['created_at'] }}</p>
                            </div>
                        </div>
                        <p class="weui-media-box__desc content" >{{ $value['content'] }}</p>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">文字来源</li>
                            <li class="weui-media-box__info__meta">时间</li>
                            <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">其它信息</li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="weui-panel product-content">
            <div class="weui-panel__bd">商品详情</div>
            <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
                <div class="weui-media-box weui-media-box_text">
                    {{ $data['description'] }}
                </div>
            </div>
        </div>
        <div class="weui-tabbar tool-bar">
            <a href="javascript:;" class="weui-tabbar__item weui-bar__item_on collection" style="">
                <span style="display: inline-block;position: relative;">
                    <img src="/static/home/images/btn_like.png" alt="" class="weui-tabbar__icon">
                </span>
                <p class="weui-tabbar__label" style="color: #FF564C">收藏</p>
            </a>

            <a href="/orders/create?id={{ $data['id'] }}" class="weui-tabbar__item buy">
                <p class="weui-tabbar__label" style="">立即购买</p>
            </a>
        </div>
    </div>
@endsection
@section('my-js')
@endsection