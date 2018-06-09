<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/6
 * Time: 19:50
 */

namespace App\Tool;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Log\Writer;

class BLogger
{
    // 所有的LOG都要求在这里注册
    const LOG_ERROR = 'error';
    private static $loggers = array();

    // 获取一个实例
    public static function getLogger($type = self::LOG_ERROR, $day = 30)
    {
        if (empty(self::$loggers[$type])) {
            self::$loggers[$type] = new Writer(new Logger($type));
            self::$loggers[$type]->useDailyFiles(storage_path().'/logs/'.$type.'/'. $type .'.log', $day);
        }
        $log = self::$loggers[$type];
        return $log;
    }
}