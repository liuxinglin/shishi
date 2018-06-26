@extends('home.master')
@section('content')
    <style>
        .weui-media-box:before {
            border-top: none;
        }
    </style>
    <div class="container" id="container" style="height: 100%;overflow: scroll">

        <div class="weui-tab product">
            <div class="weui-navbar">
                <div class="weui-navbar__item weui-bar__item_on new">
                    新上市
                </div>
                <div class="weui-navbar__item hot">
                    热卖好物
                </div>
            </div>

            <div class="weui-tab__panel">
                <div class="weui-panel weui-panel_access product-list" id="new">
                    @foreach($data as $product)
                        <div class="weui-panel__bd">
                            <div class="weui-media-box" style="padding: 0px">
                                <img src="{{ $product['image'] }}">
                            </div>
                            <div class="weui-media-box weui-media-box_text">
                                <h4 class="weui-media-box__title">{{ $product['name'] }}</h4>
                                <div class="weui-media-box" style="padding: 0px;overflow: hidden">
                                    <div class="weui-media-box__hd">
                                        <p><span class="product-price">￥{{ $product['price'] }}</span><span class="product-buy-num">已抢8.5万件</span></p>
                                    </div>
                                    <div class="weui-media-box__bd">
                                        <a href="/tryoutProducts/details?id={{ $product['id'] }}"><button class="button-try">马上抢</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="weui-panel weui-panel_access product-list" id="hot" style="display: none">
                    @foreach($data as $product)
                        <div class="weui-panel__bd">
                            <div class="weui-media-box" style="padding: 0px">
                                <img src="{{ $product['image'] }}">
                            </div>
                            <div class="weui-media-box weui-media-box_text">
                                <h4 class="weui-media-box__title">{{ $product['name'] }}</h4>
                                <div class="weui-media-box" style="padding: 0px;overflow: hidden">
                                    <div class="weui-media-box__hd">
                                        <p><span class="product-price">￥{{ $product['price'] }}</span><span class="product-buy-num">已抢8.5万件</span></p>
                                    </div>
                                    <div class="weui-media-box__bd">
                                        <a href="/tryoutProducts/details?id={{ $product['id'] }}"><button class="button-try">马上抢</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @include('home.footer')
    </div>
@endsection
@section('my-js')
    <script type="text/javascript">
        $(function(){
            $('.weui-navbar__item').on('click', function () {
                $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
                if($(this).hasClass('new')) {
                    $('#hot').css('display', 'none');
                    $('#new').css('display', 'block');
                }
                if($(this).hasClass('hot')) {
                    $('#hot').css('display', 'block');
                    $('#new').css('display', 'none');
                }
            });
        });
    </script>
@endsection
