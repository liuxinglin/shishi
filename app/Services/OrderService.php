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

    public function getOrderList($where, $page=0, $limit=15)
    {
        $result = $this->repository->getOrderList($where, $page, $limit);
        return $result;
    }

    /**
     * 新增订单
     * @param $data
     * @return mixed
     */
    public function addOrder($data)
    {
        //获取报会员详细信息
        app()->bind('MemberService', \App\Services\MemberService::class);
        $model = app()->make('MemberService');
        $memberInfo = $model->getDetails($data['member_id']);
        //订单信息
        $orderInfo = [
            'order_type' => 1,
            'order_id' => $data['member_id'].time(),
            'member_id' => $data['member_id'],
            'member_group_id' => 1,
            'fullname' => $memberInfo['nickname'],
            'total' => $data['total'],
            'telphone' => $memberInfo['phone'],
            'member_address_id' => $data['member_address_id'],
            'order_status' => 0,
            'is_comment' => 0
        ];
        //订单商品信息
        $orderProductList = [
            [
                'order_id' => $orderInfo['order_id'],
                'product_id' => 1,
                'name' => '测试商品',
                'quantity' => 1,
                'price' => 1.00,
                'preview' => '/static/home/images/product.png',
                'total' => 1.00
            ]
        ];
        DB::transaction(function () use ($orderProductList, $orderInfo) {
            $this->repository->create($orderInfo);
            app()->bind('OrderProductService', \App\Services\OrderProductService::class);
            $model = app()->make('OrderProductService');
            $model->insertAll($orderProductList);
        });
        return $orderInfo['order_id'];
    }

    /**
     * 新增试用订单
     * @param $data
     * @return mixed
     */
    public function addTryOutOrder($data)
    {
        //获取报会员详细信息
        app()->bind('MemberService', \App\Services\MemberService::class);
        $model = app()->make('MemberService');
        $memberInfo = $model->getDetails($data['member_id']);
        //订单信息
        $orderInfo = [
            'order_type' => 2,
            'order_id' => $data['member_id'].time(),
            'member_id' => $data['member_id'],
            'member_group_id' => 1,
            'fullname' => $memberInfo['nickname'],
            'total' => $data['total'],
            'telphone' => $memberInfo['phone'],
            'member_address_id' => $data['member_address_id'],
            'order_status' => 1,
            'is_comment' => 0
        ];
        //订单商品信息
        app()->bind('ProductService', ProductService::class);
        $productModel = app()->make('ProductService');
        $productInfo = $productModel->getDetails($data['product_id']);
        $orderProductList = [
            [
                'order_id' => $orderInfo['order_id'],
                'product_id' => $data['product_id'],
                'name' => $productInfo['name'],
                'quantity' => 1,
                'price' => $productInfo['price'],
                'preview' => $productInfo['image'],
                'total' => $productInfo['price']
            ]
        ];
        DB::transaction(function () use ($orderProductList, $orderInfo) {
            $this->repository->create($orderInfo);
            app()->bind('OrderProductService', \App\Services\OrderProductService::class);
            $model = app()->make('OrderProductService');
            $model->insertAll($orderProductList);
        });
        return $orderInfo['order_id'];
    }
}