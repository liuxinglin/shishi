<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 18-6-27
 * Time: 上午10:26
 */

namespace App\Formatters;


class AppFormatter
{
    use Format;

    /**
     * 成功格式化数据
     * @param array $items
     * @param string $message
     * @param bool $status
     * @return array
     */
    public function format($items = [], $message = '', $status = true)
    {
        return [
            'status' => $status,
            'code' => 0,
            'msg' => $message,
            'data' => $items,
        ];
    }

    /**
     * 失败格式化数据
     * @param integer $code
     * @param array $items
     * @param string $message
     * @param bool $status
     * @return array
     */
    public function formatFail($code = 0, $items = [], $message = '', $status = false)
    {
        return [
            'status' => $status,
            'code' => $code,
            'msg' => $message,
            'data' => $items,
        ];
    }
}