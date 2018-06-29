@extends('home.master')
@section('content')
    <div class="container enrolment" id="container">
        <div class="weui-panel enrol-details">
            <div class="weui-panel__bd enrol-rule">
                <img src="/static/home/images/btn_actrule.png" style="width: 23%">
            </div>
            <div class="weui-panel__bd">
                <div class="weui-media-box weui-media-box_appmsg member-info">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="{{ $data['member']['headimgurl'] }}" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">{{ $data['nickname'] }}</h4>
                        <p class="weui-media-box__desc">快来投我票，拿免费试用资格</p>
                    </div>
                </div>
            </div>
            <div class="weui-panel__bd">
                <div class="weui-media-box weui-media-box_appmsg product-info">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="{{ $data['tryout']['image'] }}" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">{{ $data['tryout']['name'] }}</h4>
                        <p class="weui-media-box__desc">￥{{ $data['tryout']['price'] }}</p>
                    </div>
                </div>
            </div>
            <div class="weui-panel__bd address" style="text-align: center"><p>去完善收货地址，获得免费资格即可发货</p></div>
        </div>

        <div class="weui-panel votes-info">
            <div class="weui-panel__bd">已获得<span>{{ $data['votes_num'] }}</span>票，离第一名还差<span>{{ $data['vote']['maxVoteNum'] - $data['votes_num'] }}</span>票，加油</div>
            <button class="share">分享给好友，投我一票</button>
            <button class="share vote" data-url="/votes/add">帮好友投一票</button>
            <a href="/tryoutProducts/details?id={{ $data['tryout_id'] }}"><button class="enrol-my">我也要免费拿</button></a>
        </div>

        <div class="weui-panel weui-panel_access votes-friend">
            <div class="weui-panel__hd title">投票好友</div>
            <div class="weui-panel__bd">
                @foreach($data['vote']['list'] as $vote)
                <div class="weui-media-box weui-media-box_appmsg rowup">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="{{ $vote['headimgurl'] }}" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">{{ $vote['nickname'] }}</h4>
                        <p>{{ $vote['created_at'] }}</p>
                    </div>
                    <div class="weui-media-box__ft" style="text-align: right">
                        <p style="font-size: 5vw;color: #ffea40;">投了一票</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .weui-panel:before {
            border-top: none;
        }
        .weui-media-box:before {
            left: 0;
        }
        .weui-panel:after {
            border-bottom:none;
        }
        .weui-panel__hd:after {
            left: 0;
        }
    </style>
@endsection
@section('my-js')
    <script type="application/javascript" src="/static/layer_mobile/layer.js"></script>
    <link rel="stylesheet" href="/static/home/css/layer.css"/>
    <script type="application/javascript">
        $('.vote').click(function () {
            var member_id = '{{ session('member.id') }}';
            var enlt_id = '{{ $data['id'] }}';
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'POST',
                url: url,
                data: {'member_id': member_id, 'enlt_id': enlt_id, '_token': '{{ csrf_token() }}'},
                success: function (rst) {
                    if(rst.status == false) {
                        layer.open({
                            content: rst.msg
                            ,skin: 'msg'
                            ,time: 2 //2秒后自动关闭
                        });
                        return false;
                    }
                    layer.open({
                        content: rst.msg
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }
            })
        })

        $(".enrol-rule").click(function(){
            layer.open({
                style: 'color:#333;text-align:left;font-size:14px;position:relative;width:80%',
                title: [
                    '活动规则',
                     'border-bottom: 1px solid #E5E5E5;'
                ],
                content: '<p>1、免费报名使用名额</p><p>2、报名用户中投票前20名用户获得免费试用资格</p><p>3、参与投票的用户都可获得优惠券</p>',
                success: function(elem){
                    $(".layui-m-layercont").css({"text-align":"left", "padding-top":"20px", "overflow":"auto", "height":"150px"});
                    $(".layui-m-layercont p").css({"margin-bottom":"10px"});
                    $('.layui-m-layerchild').append('<div class="layer-close">X</div>');
                    $('.layer-close').click(function () {
                        layer.closeAll()
                    })
                },
            });
        });
    </script>
@endsection