<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 2018/8/19
 * Time: 17:49
 */

namespace App\Services;
use EasyWeChat\Factory;
use App\Tool\BLogger;


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

    public function notify()
    {
        $config = config('wechat.payment.default');
        $app = Factory::payment($config);
        $response = $app->handlePaidNotify(function($message, $fail){
            BLogger::getLogger('pay')->info('支付回调信息：'.json_encode($message));
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
//            $order = 查询订单($message['out_trade_no']);

//            if (!$order || $order->paid_at) { // 如果订单不存在 或者 订单已经支付过了
//                return true; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
//            }
//
//            ///////////// <- 建议在这里调用微信的【订单查询】接口查一下该笔订单的情况，确认是已经支付 /////////////
//
//            if ($message['return_code'] === 'SUCCESS') { // return_code 表示通信状态，不代表支付状态
//                // 用户是否支付成功
//                if (array_get($message, 'result_code') === 'SUCCESS') {
//                    $order->paid_at = time(); // 更新支付时间为当前时间
//                    $order->status = 'paid';
//
//                    // 用户支付失败
//                } elseif (array_get($message, 'result_code') === 'FAIL') {
//                    $order->status = 'paid_fail';
//                }
//            } else {
//                return $fail('通信失败，请稍后再通知我');
//            }
//
//            $order->save(); // 保存订单

            return true; // 返回处理完成
        });

        return $response;
    }
}