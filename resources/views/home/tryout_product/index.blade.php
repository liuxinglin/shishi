@extends('home.master')
@section('content')
    <div class="container" id="container">
    <div class="swiper-container">
        <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="/static/home/images/banner.png"></div>
        <div class="swiper-slide"><img src="/static/home/images/banner.png"></div>
        <div class="swiper-slide"><img src="/static/home/images/banner.png"></div>
    </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination"></div>
    </div>
    <div class="weui-panel weui-panel_access product-list">
        @foreach($data as $product)
            <div class="weui-panel__bd">
            <div class="weui-media-box" style="padding: 0px">
                <img src="{{ $product['image'] }}">
            </div>
            <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title">{{ $product['name'] }}</h4>
                <div class="weui-media-box" style="padding: 0px;overflow: hidden">
                    <div class="weui-media-box__hd">
                        <p>免费试用名额：<span class="tryput-num">{{ $product['quantity'] }}</span></p>
                        <p>已报名：<span>{{ $product['signup_num'] }}</span></p>
                    </div>
                    <div class="weui-media-box__bd">
                        <a href="/tryoutProducts/details?id={{ $product['id'] }}"><button class="button-try">免费试 ></button></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @include('home.footer')
    </div>
@endsection
@section('my-js')
    <script>
        var mySwiper = new Swiper ('.swiper-container', {
            loop: true,
            autoplay:true,

            // 如果需要分页器
            pagination: {
                el: '.swiper-pagination',
            },
        })
    </script>
@endsection
