@extends('home.master')
@section('content')
    <div class="container comment" id="container">
        <div class="page__bd" style="margin-bottom: 15vw">
            <div class="weui-cells" style="margin-top: 0px">
                <div class="weui-panel__bd order-info">
                    <div class="weui-media-box weui-media-box_appmsg product-info">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="{{ $orderInfo['product'][0]['preview'] }}" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            {{--<h4 class="weui-media-box__title">{{ $orderInfo['product'][0]['name'] }}</h4>--}}
                            <p class="weui-media-box__desc">{{ $orderInfo['product'][0]['name'] }}</p>
                        </div>
                        <div class="weui-media-box__ft">
                            <p>￥{{ $orderInfo['total'] }}</p>
                            <p>X{{ $orderInfo['product'][0]['quantity'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="weui-cells weui-cells_form">
                <div class="weui-cell content">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea" id="content" placeholder="请输入评价内容" rows="3"></textarea>
                    </div>
                </div>
                <div class="weui-cell picture">
                    <div class="weui-uploader__input-box">
                        <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple/>
                    </div>
                </div>

                <div class="weui-cell experience">
                    <div class="title">总体感受</div>
                    <div>
                        <button class="choice_on" data-val="1">好评</button>
                        <button data-val="2">中评</button>
                        <button data-val="3">差评</button>
                    </div>
                </div>
            </div>

            <div class="weui-cells score">
                <div class="weui-cells__title">服务打分</div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">商品描述</div>
                    <div class="weui-cell__bd">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">产品质量</div>
                    <div class="weui-cell__bd">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">发货速度</div>
                    <div class="weui-cell__bd">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                        <img src="/static/home/images/img_star.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="weui-tabbar tool-bar">
            <div href="javascript:;" class="weui-tabbar__item weui-bar__item_on collection" style="width: 50%;text-align: center">
            </div>

            <a href="javascript:;" data-url="/comments/add" class="weui-tabbar__item submit">
                <p class="weui-tabbar__label">提交评价</p>
            </a>
        </div>
    </div>
@endsection
@section('my-js')
    <script type="application/javascript" src="/static/layer_mobile/layer.js"></script>
    <link rel="stylesheet" href="/static/home/css/layer.css"/>
    <script type="text/javascript">
        var experience = 1;
        $(function(){
            $('.experience button').on('click', function () {
                $(this).addClass('choice_on').siblings('.choice_on').removeClass('choice_on');
                experience = $(this).attr('data-val');
            });
        });
        $('.submit').click(function () {
            var member_id = '{{ session('member.id') }}';
            var content = $("#content").val();
            var product_id = '{{ $orderInfo['product'][0]['product_id'] }}';
            var order_id = '{{ $orderInfo['order_id'] }}'
            var url = $(this).attr('data-url');
            console.log(content);
            $.ajax({
                type: 'POST',
                url: url,
                data: {'member_id': member_id, 'content': content, 'experience':experience, 'order_id': order_id, 'product_id': product_id, '_token': '{{ csrf_token() }}'},
                success: function (rst) {
                    console.log(rst);
                    if(rst.status == false) {
                        layer.open({
                            content: rst.msg
                            ,skin: 'msg'
                            ,time: 2 //2秒后自动关闭
                            ,type: 1
                        });
                        return false;
                    } else  {
                        layer.open({
                            content: rst.msg
                            ,skin: 'msg'
                            ,time: 2 //2秒后自动关闭
                        })
                    }
                }
            })
        })
    </script>
@endsection
