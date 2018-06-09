<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/27 0027
 * Time: 下午 6:10
 */

namespace App\Tool\SMS;

use App\Tool\CurlRequest;

class SendSMS
{
    //商户号
    private $mch_id;

    //应用APPID
    private $appid;

    //短信平台秘钥
    private $key;

    public function __construct()
    {
        $this->mch_id = config('system.sms.yhxf.mch_id');
        $this->appid = config('system.sms.yhxf.appid');
        $this->key = config('system.sms.yhxf.key');
//        $this->mch_id = '170327127';
//        $this->appid = 'JQ00010';
//        $this->key = '2916CE71E9AD40F181B7F508BD72F706';
    }

    /**
     * 发送短信验证码
     * @param $data
     * @return mixed
     */
    public function sendSMS($data)
    {
        //短信接口地址
        $url = 'http://voicesmsapi.vnetone.com/Order/Add';
        $data['appid'] = $this->appid;
        $data['mch_id'] = $this->mch_id;
        $data['nonce_str'] = $this->getNonceStr();
        //获取签名
        $data['sign'] = $this->makeSign($data);
        //讲数组转换成XML
        $data = $this->arrayToXml($data);
        $curl= new CurlRequest($url, $data, 'post');
        $result = $this->xmlToArray($curl->doRequest());
        if($result['return_code'] == 'FAIL') {
            return ['status' => false, 'msg' => $result['return_msg']];
        }
        return ['status' => true, 'msg' => $result['return_msg']];
    }

    //数组转XML
    public function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.= "<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }

    /**
     * 格式化参数格式化成url参数
     */
    public function toUrlParams($arr)
    {
        $buff = "";
        foreach ($arr as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff;
    }

    //将XML转为array
    public function xmlToArray($xml)
    {
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }

    /**
     * 生成签名
     * @return 签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
     */
    protected function makeSign($arr)
    {
        //签名步骤一：按字典序排序参数
        ksort($arr);
        $string = $this->toUrlParams($arr);
        //签名步骤二：在string后加入KEY
        $string = $string . "&key=".config('system.sms.yhxf.key');;
        //签名步骤三：MD5加密
        $string = md5($string);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);
        return $result;
    }

    /**
     *
     * 产生随机字符串，不长于32位
     * @param int $length
     * @return 产生的随机字符串
     */
    protected function getNonceStr($length = 32)
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str ="";
        for ( $i = 0; $i < $length; $i++ )  {
            $str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;
    }
}