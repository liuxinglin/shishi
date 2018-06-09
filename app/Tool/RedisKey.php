<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/14
 * Time: 10:18
 */

namespace App\Tool;


class RedisKey
{
    public static function create($prefix = '', $data = [])
    {
        //数组按key排序
        ksort($data);
        $buff = "";
        foreach ($data as $k => $v)
        {
            if($v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }
        $buff = trim($buff, "&");
        return md5($prefix.$buff);;
    }
}