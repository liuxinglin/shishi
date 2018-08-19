@extends('home.master')
@section('content')
    <div class="container order" id="container">
        <div class="page__bd">
            <div class="weui-cells weui-cells_form" style="margin-top: 0px">

                <div class="weui-cell" style="    background: url(/static/home/images/img_adressBG.png) no-repeat;background-position:bottom;background-size:100%;border: none;">
                    @if(empty($memberAddress))
                        <a class="weui-cell__hd" href="/address/create"><img src="/static/home/images/btn_addadress.png" style="width: 55%"></a>
                        <div class="weui-cell__bd">
                            <p>新建收货地址</p>
                        </div>
                    @else
                        @foreach($memberAddress as $value)
                            @if($value['is_default'] == 1)
                                <div class="weui-cell__hd" style="font-size: 4.5vw; line-height: 9vw">
                                    <p style="font-weight: 600">{{ $value['contacts'] }}  {{ $value['phone'] }}</p>
                                    <p>{{ $value['province'].$value['city'].$value['county'].$value['address'] }}</p>
                                    <input type="hidden" name="address_id" value="{{ $value['id'] }}">
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_appmsg product-info">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="{{ $product['image'] }}" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">{{ $product['name'] }}</h4>
                            <p class="weui-media-box__desc">{{ $product['price'] }}</p>
                            <input type="hidden" name="price" value="{{ $product['price'] }}">
                        </div>
                    </div>
                </div>

                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">购买数量</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" name="quantity" placeholder="请输入购买数量"/>
                    </div>
                </div>
                <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">配送方式</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="select2">
                            <option value="1">普通快递</option>
                        </select>
                    </div>
                </div>

            </div>


            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                        <p>优惠券</p>
                    </div>
                    <div class="weui-cell__ft">有一张优惠券可用</div>
                </a>
            </div>

        </div>
        <div class="weui-tabbar tool-bar">
            <a href="javascript:;" class="weui-tabbar__item weui-bar__item_on collection" style="width: 50%;text-align: center">
                <p class="weui-tabbar__label" style="color: #FF564C;font-size: 4.5vw;line-height: 12vw">实付款：￥<span class="total">0.00</span></p>
            </a>

            <a href="javascript:;" data-url="/orders/add" class="weui-tabbar__item buy">
                <p class="weui-tabbar__label">立即下单</p>
            </a>
        </div>
    </div>
@endsection
@section('my-js')
    <script type="application/javascript" src="/static/layer_mobile/layer.js"></script>
    <link rel="stylesheet" href="/static/home/css/layer.css"/>
    <script type="application/javascript">
        var total = 0.00;
        var quantity = 0;
        $("input[ name='quantity']").blur(function() {
            var price = $("input[ name='price']").val();
            quantity = $("input[ name='quantity']").val();
            total = price * quantity;
            $('.total').text(total);
        });
        $('.buy').click(function () {
            var member_id = '{{ session('member.id') }}';
            var member_address_id = $("input[ name='address_id']").val();
            var product_id = '{{ $product['id'] }}';
            var url = $(this).attr('data-url');
            if(quantity == 0) {
                layer.open({
                    content: '购买商品数量不能为空'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                })
                return false;
            }
            $.ajax({
                type: 'POST',
                url: url,
                data: {'member_id': member_id, 'total': total, 'member_address_id': member_address_id, 'quantity': quantity, 'product_id': product_id, '_token': '{{ csrf_token() }}'},
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
                        window.location.href = '/orders/details?order_id='+rst.data.order_id;
                    }
                }
            })
        })
    </script>
@endsection
