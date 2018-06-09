<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/14
 * Time: 15:12
 */
namespace App\Tool\Pay;

use App\Tool\BLogger;

class LalaPay
{
    private $userId; //商户号
    private $auth;   //商户密码
    private $md5;    //商户秘钥
    private $returnUrl; //异步回调地址
    private $callbackUrl; //同步回调地址
    private $hostUrl;  //商户下单地址
    public function __construct()
    {
        $this->userId = 10001;
        $this->auth = '033bd94b1168d7e4f0d644c3c95e35bf';
        $this->md5 = '444bcb3a3fcf8389296c49467f27e1d6';
        $this->returnUrl = 'http://manage.ai6d.cn/api/pay/callback';
        $this->callbackUrl = 'http://manage.ai6d.cn/api/pay/callback';
        $this->hostUrl = 'http://106.75.176.151:8088/order/creartOrder';

    }

    /**
     * 请求下单
     * @param array $orderInfo
     * @return array
     */
    public function addOrder($orderInfo = [])
    {
        //支付类型
        $payType = [
            '1' => 'zfb',
            '2' => 'wx',
            '3' => 'qq'
        ];
        //订单信息
        $parameter['amount'] = $orderInfo['total'];
        $parameter['gid']    = 1; //支付分组
        $parameter['goodsname']   = $orderInfo['goods_name']; //商品名称
        $parameter['orderId'] = $orderInfo['order_id'];
        $parameter['returnUrl'] = $this->returnUrl;
        $parameter['callbackUrl'] = $this->callbackUrl;
        $parameter['bankid'] = $payType[$orderInfo['pay_type']];

        //sign  金额 + 订单号 + 账户号 + 用户UID + MD5
        $parameter['sign'] = md5($parameter['amount'].$parameter['orderId'].$this->userId.$this->md5);
        $parameter['ext'] = "testEXT";

        $authCode = base64_encode($this->userId . "::" . $this->auth);
        $headers = array();
        $headers[] = 'AUTHORIZATION:' . $authCode;
        try {
            $url = $this->hostUrl;
            header("Content-Type:application/json");
            $data = $this->http_request_xml($url, $parameter, $headers);
            BLogger::getLogger('LalaPay')->info('拉拉支付：'.$data);
            $data = json_decode($data, true);
            if(empty($data) || ($data['status']) != 1) {
                return ajax_arr('请求下单异常', 500);
            }

            if($data['url'] == false) {
                return ajax_arr('请求下单未能获取支付链接', 500);
            }
            return ajax_arr('请求下单成功', 0, ['url' => $data['url']]);
        } catch (\Exception $e) {
            BLogger::getLogger('LalaPay')->info('拉拉支付：'.$e->getMessage());
        }
    }

    /**
     * 验证回调参数
     * @param array $data
     * @return array
     */
    public function checkCallBack($data = [])
    {
        $amount = $data['amount'];
        $orderId = $data['order_id'];
        $sign = md5("{$amount}{$orderId}{$this->userId}{$this->md5}");
        if($sign  != $data['sign']){
            return ajax_arr('参数验证不合法', 500);

        }
        return ajax_arr('支付成功', 0);
    }

    /**
     * 发送curl请求
     * @param $url
     * @param null $data
     * @param null $arr_header
     * @return mixed
     */
    private function http_request_xml($url, $data = null, $arr_header = null)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_TIMEOUT, 20);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $arr_header);
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        $output = curl_exec($curl);
        $n = curl_getinfo($curl, CURLINFO_HEADER_OUT);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}