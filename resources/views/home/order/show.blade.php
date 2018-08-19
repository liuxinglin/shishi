@extends('home.master')
@section('content')
    <div class="page">
        <div class="page__bd">
            <div class="weui-form-preview">
                <div class="weui-form-preview__hd">
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">付款金额</label>
                        <em class="weui-form-preview__value">{{ $orderInfo['total'] }}</em>
                    </div>
                </div>
                @foreach($orderInfo['product'] as $product)
                <div class="weui-form-preview__bd">
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">商品</label>
                        <span class="weui-form-preview__value">{{ $product['name'] }}</span>
                    </div>
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">数量</label>
                        <span class="weui-form-preview__value">{{ $product['quantity'] }}</span>
                    </div>
                </div>
                @endforeach
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="javascript:" onclick="callpay()">付款</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('my-js')
    <script type="application/javascript" src="/static/layer_mobile/layer.js"></script>
    <link rel="stylesheet" href="/static/home/css/layer.css"/>
    <script type="text/javascript">
        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                <?php echo $getJsApiParameters; ?>,
                function(res){
                    WeixinJSBridge.log(res.err_msg);
                    alert(res.err_code);
//                    if (res.err_code == 'Success') {
//                        layer.open({
//                            content: '支付成功'
//                            ,skin: 'msg'
//                            ,time: 2 //2秒后自动关闭
//                            ,type: 1
//                        });
//                        window.location.href = '/members/index';
//                    } else {
//                        layer.open({
//                            content: '支付失败'
//                            ,skin: 'msg'
//                            ,time: 2 //2秒后自动关闭
//                            ,type: 1
//                        });
//                    }
                }
            );
        }
        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }
    </script>
@endsection