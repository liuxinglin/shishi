@extends('home.master')
@section('content')
    <div class="container" id="container">
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

                <div class="weui-media-box weui-media-box_text">
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
                <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                    <div class="weui-cell__bd">用户使用评论（{{ $data['comments']['total'] }}）</div>
                    <span class="weui-cell__ft">查看更多</span>
                </a>
            </div>
            <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
                @foreach($data['comments']['list'] as $value)
                    <div class="weui-media-box weui-media-box_text" style="border-bottom: 1px solid #E5E5E5">
                        <div class="user-info">
                            <div class="weui-media-box__hd">
                                <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
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
            <a href="javascript:;" class="weui-tabbar__item weui-bar__item_on collection" style="width: 50%;text-align: center">
                <span style="display: inline-block;position: relative;">
                    <img src="/static/home/images/btn_like.png" alt="" class="weui-tabbar__icon">
                </span>
                <p class="weui-tabbar__label" style="color: #FF564C">收藏</p>
            </a>

            <a href="/orders/create?id={{ $data['id'] }}" class="weui-tabbar__item signup">
                <p class="weui-tabbar__label">立即购买</p>
            </a>
        </div>
    </div>
@endsection
@section('my-js')
@endsection