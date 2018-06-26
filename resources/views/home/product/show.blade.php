@extends('home.master')
@section('content')
    <style>
        .weui-media-box:before {
            border-top: none;
        }
    </style>
    <div class="container" id="container" style="height: 100%;overflow: scroll">
    <div class="weui-panel weui-panel_access" style="margin-top: 0px;">
        <div class="weui-panel__bd">
            <div class="weui-media-box" style="padding: 0px">
                <img src="/static/home/images/procuct_show.png" style="width: 100%;height: 100%">
            </div>
            <div class="weui-media-box weui-media-box_text" style="padding-bottom: 0px">
                <div class="weui-media-box" style="padding: 0px;overflow: hidden">
                    <div class="weui-media-box__hd" style="text-align: left;width: 40%;float: left;">
                        <p style="color: #E4393C;font-size: 20px;font-weight: 600">免费</p>
                    </div>
                    <div class="weui-media-box__bd" style="width: 60%;float: left;text-align: left">
                        <p style="background: url(/static/home/images/img_goodstab.png) no-repeat;width:144px; height:27px;background-size:100% 100%;padding-left: 18px;padding-right: 18px;border: none;color: #ffffff">免费试用资格抢购中</p>
                    </div>
                </div>
                <h4 class="weui-media-box__title" style="white-space: normal;color: #404040">九阳（Joyoung）豆浆机免滤快速制浆米糊1.3L家用全自动</h4>
            </div>
            <div class="weui-media-box weui-media-box_text" style="background-color: #fef1f1">
                <div class="weui-media-box" style="padding: 0px;overflow: hidden;line-height:30px;font-size: 18px">
                    <div class="weui-media-box__hd" style="text-align: left;width: 50%;float: left;">
                    <img src="/static/home/images/img_goodstab2.png" style="width: 80%;height: 100%">
                </div>
                    <div class="weui-media-box__bd" style="width: 50%;float: left;text-align: right">
                    <p>剩余时间   <span style="color: #e4393c;margin-left: 10px">21:12:21</span></p>
                </div>
                </div>
                <div class="product-promise" style="font-size: 14px;overflow: hidden">
                    <p style="float: left;padding-right: 7px"><span style="background: url(/static/home/images/img_goodstab3.png) no-repeat;background-size:100% 100%;padding-left: 4vw;border: none;margin-right: 5px"></span>全场包邮</p>
                    <p style="float: left;padding-right: 7px"><span style="background: url(/static/home/images/img_goodstab3.png) no-repeat;background-size:100% 100%;padding-left: 4vw;border: none;margin-right: 5px"></span>7天退换</p>
                    <p style="float: left;padding-right: 7px"><span style="background: url(/static/home/images/img_goodstab3.png) no-repeat;background-size:100% 100%;padding-left: 4vw;border: none;margin-right: 5px"></span>48小时发货</p>
                    <p style="float: left;padding-right: 7px"><span style="background: url(/static/home/images/img_goodstab3.png) no-repeat;background-size:100% 100%;padding-left: 4vw;border: none;margin-right: 5px"></span>假一赔十</p>
                </div>
            </div>
        </div>
    </div>
    <div class="weui-panel">
        <div class="weui-panel__bd">
            <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                <div class="weui-cell__bd">7人正在抢购，可直接参</div>
                <span class="weui-cell__ft">查看更多</span>
            </a>
        </div>
        <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg" style="border-bottom: 1px solid #E5E5E5">
                <div class="weui-media-box__hd">
                    <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
                </div>
                <div class="weui-media-box__bd">
                    <h4 class="weui-media-box__title">shmily</h4>
                </div>
                <div class="weui-media-box__ft">
                    <p class="weui-media-box__desc">已获得票数：187</p>
                </div>
            </a>

            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg" style="border-bottom: 1px solid #E5E5E5">
                <div class="weui-media-box__hd">
                    <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
                </div>
                <div class="weui-media-box__bd">
                    <h4 class="weui-media-box__title">标题二</h4>
                </div>
                <div class="weui-media-box__ft">
                    <p class="weui-media-box__desc">已获得票数：187</p>
                </div>
            </a>
        </div>
    </div>

    <div class="weui-panel">
        <div class="weui-panel__bd">
            <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                <div class="weui-cell__bd">用户使用评论（12223）</div>
                <span class="weui-cell__ft">查看更多</span>
            </a>
        </div>
        <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
            <div class="weui-media-box weui-media-box_text" style="border-bottom: 1px solid #E5E5E5">
                <h4 class="weui-media-box__title">测试11</h4>
                <p class="weui-media-box__desc">真的免费拿到了产品</p>
                <ul class="weui-media-box__info">
                    <li class="weui-media-box__info__meta">文字来源</li>
                    <li class="weui-media-box__info__meta">时间</li>
                    <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">其它信息</li>
                </ul>
            </div>
            <div class="weui-media-box weui-media-box_text" style="border-bottom: 1px solid #E5E5E5">
                <h4 class="weui-media-box__title">测试11</h4>
                <p class="weui-media-box__desc">真的免费拿到了产品</p>
                <ul class="weui-media-box__info">
                    <li class="weui-media-box__info__meta">文字来源</li>
                    <li class="weui-media-box__info__meta">时间</li>
                    <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">其它信息</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="weui-panel">
        <div class="weui-panel__bd">商品详情</div>
        <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
            <div class="weui-media-box weui-media-box_text">
                <img src="/static/home/images/details.png" style="height: 100%;width: 100%">
            </div>
        </div>
    </div>

    <div class="weui-tabbar">
        <a href="javascript:;" class="weui-tabbar__item weui-bar__item_on">
        <span style="display: inline-block;position: relative;">
            <img src="/static/home/images/btn_like.png" alt="" class="weui-tabbar__icon">
        </span>
            <p class="weui-tabbar__label" style="color: #FF564C">收藏</p>
        </a>
        <a href="javascript:;" class="weui-tabbar__item">
            <img src="/static/home/images/btn_goods.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">活动详情</p>
        </a>

        <a href="javascript:;" class="weui-tabbar__item" style="background-color: red;">
            <p class="weui-tabbar__label" style="color: #FFFFFF;font-size: 6vw">我要报名</p>
        </a>
    </div>
    </div>
@endsection