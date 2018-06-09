<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/28
 * Time: 10:18
 */

if ( ! function_exists( 'full_uri' ) ) {
    function full_uri( $uri , $param = [] ) {
        return url( strtolower($uri) , $param  );
    }
}

if ( ! function_exists( 'extend' ) ) {
    /**
     * 扩展数组
     *
     * @param $config
     * @param $default
     *
     * @return mixed
     */
    function extend( $default , $config ) {
        foreach ( $default as $key => $val ) {
            if ( ! isset( $config [ $key ] ) || $config[ $key ] === '' ) {
                $config [ $key ] = $val;
            } else if ( is_array( $config [ $key ] ) ) {
                $config [ $key ] = extend( $val , $config [ $key ] );
            }
        }

        return $config;
    }
}

if ( ! function_exists( "ajax_arr" ) ) {
    /**
     * 生成需要返回 ajax 数组
     *
     * @param $msg        //消息
     * @param int $code   //0 正常 , > 0 错误
     * @param array $data //需要传递的参数
     *
     * @return array
     */
    function ajax_arr( $msg , $code = 500 , $data = [] ) {
        $arr = [
            'msg'  => $msg ,
            'code' => $code ,
        ];

        if ( $data !== '' ) {
            $arr['data'] = $data;
        }

        return $arr;
    }
}

if ( ! function_exists( 'str2pwd' ) ) {
    /**
     * 字符串加密
     *
     * @param $str
     *
     * @return bool|string
     */
    function str2pwd( $str ) {
        return password_hash( $str , PASSWORD_BCRYPT , [ "cost" => 10 ] );
    }
}

if ( ! function_exists( 'json' ) ) {

    function json(Array $array){
        return response()->json($array);
    }

}
if( ! function_exists( 'api_result' ) ){

    function api_result( $msg, $code_or_data = 500, $data = [] ) {
        $result = [
            'msg' => $msg
        ];

        if ( is_array( $code_or_data ) ) {
            $result['code'] = 0;
            $data           = array_merge( $code_or_data, $data );
        } else {
            $result['code'] = $code_or_data;
        }

        if ( ! empty( $data ) ) {
            $result['data'] = $data;
        }

        return $result;
    }
}

if ( ! function_exists( 'rand_string' ) ) {
    /**
     * 生成随机字符串
     *
     * @param $length
     *
     * @return string
     */
    function rand_string( $length = 6 ) {
        $str    = NULL;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max    = strlen( $strPol ) - 1;

        for ( $i = 0; $i < $length; $i ++ ) {
            $str .= $strPol [ rand( 0 , $max ) ]; // rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }

        return $str;
    }
}

if(!function_exists('arr_sort')) {
    /**
     * 二维数组排序
     * @param array $arr
     * @param string $direction
     * @param string $field
     * @return array
     */
    function arr_sort($arr = [], $direction = 'SORT_DESC', $field = ''){
        $sort = array(
            'direction' => $direction, //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
            'field'     => $field,       //排序字段
        );
        $arrSort = array();
        foreach($arr AS $uniqid => $row){
            foreach($row AS $key=>$value){
                $arrSort[$key][$uniqid] = $value;
            }
        }
        if($sort['direction']){
            array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arr);
        }
        return $arr;
    }
}

if (!function_exists('curl_get')) {
    /**
     * curl get 请求
     * @param $url
     * @return mixed
     */
    function curl_get($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}

if (!function_exists('curl_post')) {
    /**
     * curl post 请求
     * @param array $data
     * @param $url
     * @return mixed
     */
    function curl_post($data = [], $url, $json = false) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //The number of seconds to wait while trying to connect. Use 0 to wait indefinitely.
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        if (!empty($data)) {
            if($json && is_array($data)){
                $data = json_encode( $data );
            }
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            if($json){
                //发送JSON数据
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json; charset=utf-8',
                        'Content-Length:' . strlen($data))
                );
            }
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    //数组转XML
    function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }

    //将XML转为array
    function xmlToArray($xml)
    {
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }

    function time2second($seconds){
        $seconds = (int)$seconds;
        $days_num = '';
        if($seconds >= 24*3600){
            $days		= (int)($seconds/86400);
            $days_num	= $days."天";
            $seconds	= $seconds % 86400;//取余
        }
        $hours = intval($seconds/3600);
        $minutes = intval($seconds % 3600/60);//取余下秒数
        $seconds = intval($seconds % 3600 % 60);

        $time = $days_num.$hours."时".$minutes.'分'.$seconds.'秒';
        return $time;
    }
    
    function turn_array($array,$key)
    {
        $arr=array();
        foreach($array as $k =>$value)
        {
            unset($value[$key]);
            $arr[$array[$k][$key]]=$value;
        }
        return $arr;
    }

    /**
     * 生成UUID
     * @param string $prefix
     * @return string
     */
    function create_uuid($prefix = '') {

        $chars = md5(uniqid(mt_rand(), true));

        $uuid = substr($chars,0,8);
        $uuid .= substr($chars,8,4);
        $uuid .= substr($chars,12,4);
        $uuid .= substr($chars,16,4);
        $uuid .= substr($chars,20,12);

        return $prefix . $uuid;
    }
}
