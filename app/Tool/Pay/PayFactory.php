<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/16
 * Time: 18:42
 */

namespace App\Tool\Pay;

class PayFactory
{
    public static function build($className = '')
    {
        $className = 'App\Tool\Pay\\'.ucfirst($className);
        if($className && class_exists($className)) {
            return new $className;
        }
        return null;
    }
}