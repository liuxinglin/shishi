<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 2018/7/1
 * Time: 9:48
 */

namespace App\Services;


use App\Repositories\OrderRepositoryEloquent;
use App\Repositories\MemberRepositoryEloquent;
use Illuminate\Http\Request;
use DB;

class OrderService
{
    protected $repository;

    public function __construct(OrderRepositoryEloquent $order)
    {
        $this->repository = $order;
    }

    public function add(Request $request)
    {
        $data = $request->except('_token');
        //获取报会员详细信息
        app()->bind('MemberService', \App\Services\MemberService::class);
        $model = app()->make('MemberService');
        $memberInfo = $model->getDetails($data['member_id']);
        //订单信息
        $orderInfo = [
            'order_id' => $data['member_id'].time(),
            'member_id' => $data['member_id'],
            'member_group_id' => 1,
            'fullname' => $memberInfo['nickname'],
            'total' => $data['total'],
            'telphone' => $memberInfo['phone'],
            'member_address_id' => $data['member_address_id'],
            'order_status' => 0,
        ];
        //订单商品信息
        $orderProductList = [
            [
                'order_id' => $orderInfo['order_id'],
                'product_id' => 1,
                'name' => '测试商品',
                'quantity' => 1,
                'price' => 1.00,
                'total' => 1.00
            ]
        ];
        $result = DB::transaction(function () use ($orderProductList, $orderInfo) {
            $this->repository->create($orderInfo);
            app()->bind('OrderProductService', \App\Services\OrderProductService::class);
            $model = app()->make('OrderProductService');
            $model->insertAll($orderProductList);
        });

        return empty($result) ? $result : $orderInfo['order_id'];
    }
}