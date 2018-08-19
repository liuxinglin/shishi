@extends('home.master')
@section('content')
    <style>
        .weui-media-box:before {
            border-top: none;
        }
    </style>
    <div class="container coupons" id="container" style="height: 100%;overflow: scroll">
        <div class="weui-navbar">
            <div class="weui-navbar__item weui-bar__item_on all">
                <p>可使用（1）</p>
            </div>
            <div class="weui-navbar__item pay" >
                <p>已过期（0）</p>
            </div>
        </div>
        <div class="weui-tab">
            <div class="weui-tab__panel coupon-list">
                <div class="weui-panel weui-panel_access" id="all">
                    <div class="weui-panel__bd">
                        @foreach($couponList as $coupon)
                            <div class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <h3>免费券</h3>
                                    <p>指定商品可用</p>
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">仅可购买本商场指定商品</h4>
                                    <p class="weui-media-box__desc">
                                        {{ $coupon['coupon']['coupon_name'] }}
                                    </p>
                                    <p class="weui-media-box__desc">
                                        <span>{{ $coupon['coupon']['coupon_end_period'] }}</span>
                                        <a href="/products/details?id={{ $coupon['coupon']['product_ids'] }}"></a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="weui-panel weui-panel_access" id="pay" style="display: none">
                    <div class="weui-panel__bd">
                        @foreach($couponList as $coupon)
                            <div class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">仅可购买本商场指定商品</h4>
                                    <p class="weui-media-box__desc">
                                        {{ $coupon['coupon']['coupon_name'] }}
                                    </p>
                                </div>
                            </div>
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
