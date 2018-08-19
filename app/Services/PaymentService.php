<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 2018/8/19
 * Time: 17:49
 */

namespace App\Services;
use EasyWeChat\Factory;


class PaymentService
{
    public function __construct()
    {
    }

    public function createPreOrder($orderInfo)
    {
        $config = config('wechat.payment.default');
        $app = Factory::payment($config);
        $result = $app->order->unify([
            'body' => $orderInfo['product_name'],
            'out_trade_no' => $orderInfo['order_id'],
            'total_fee' => $orderInfo['total'],
            //'spbill_create_ip' => '123.12.12.123', // 可选，如不传该参数，SDK 将会自动获取相应 IP 地址
            'notify_url' => 'http://www.52mhf.com/payments/notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI',
            'openid' => $orderInfo['openid'],
        ]);
        return $result;
    }

    public function getJsApiParameters($prepay_id)
    {
        $config = config('wechat.payment.default');
        $app = Factory::payment($config);
        $jssdk = $app->jssdk;
        $json = $jssdk->bridgeConfig($prepay_id);
        return $json;
    }

    public function notify($callback)
    {

    }
}