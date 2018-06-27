<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 18-6-27
 * Time: 上午10:22
 */
namespace App\Formatters;

use \Illuminate\Database\QueryException;

trait Format
{
    public function formatException(\Exception $e)
    {
        return [
            'status' => false,
            'code' => $e->getCode(),
            'message' => $e->getMessage(),
            'data' => [],
        ];
    }

    public function formatQueryExcepiton(QueryException $e)
    {
        return [
            'status' => false,
            'code' => $e->getCode(),
            'message' => '操作失败',
            'data' => [],
        ];
    }

    /**
     * @param string $message
     * @return array
     */
    public function formatFalseReturn($message = '')
    {
        return [
            'status' => false,
            'code' => 0,
            'message' => $message,
            'data' => [],
        ];
    }

    /**
     * @param array $data
     * @param bool  $object
     *
     * @return array
     */
    public function formatCommonData(array $data = [], $object = false)
    {
        return [
            'status' => true,
            'code' => 0,
            'message' => '',
            'data' => (empty($data) && $object) ? new \stdClass() : $data,
        ];
    }

    public function translateAdminCheckLog($collection)
    {
        $return = [];
        foreach ($collection as $i) {
            $return[] = [
                'id' => $i['id'],
                'user_id' => $i['user_id'],
                'result_text' => $i['result_text'],
                'created_at' => $i['created_at'],
                'remark' => $i['remark'],
            ];
        };
        return $return;
    }
}