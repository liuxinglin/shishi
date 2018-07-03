@extends('home.master')
@section('content')
    <div class="container member" id="container">
        <div class="weui-media-box weui-media-box_text info">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
            </div>
            <h4 class="weui-media-box__title nickname">{{ $member['nickname'] }}</h4>
            <p class="weui-media-box__desc auth">已认证</p>
        </div>

        <div class="weui-panel weui-panel_access order-panel">
            <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                <div class="weui-cell__bd">我的订单</div>
                <span class="weui-cell__ft">查看更多</span>
            </a>
            <div class="weui-panel__bd">
                <div class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__bd">
                        <img class="weui-media-box__thumb" src="/static/home/images/btn_info_notpay.png" alt="">
                        <p>待付款</p>
                    </div>
                    <div class="weui-media-box__bd"></div>
                    <div class="weui-media-box__bd">
                        <img class="weui-media-box__thumb" src="/static/home/images/btn_info_notget.png" alt="">
                        <p>待收货</p>
                    </div>
                    <div class="weui-media-box__bd"></div>
                    <div class="weui-media-box__bd">
                        <img class="weui-media-box__thumb" src="/static/home/images/btn_info_nojudge.png" alt="">
                        <p>待评价</p>
                    </div>
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
                        <a class="weui-cell weui-cell_access" href="javascript:;">
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
