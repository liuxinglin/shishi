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

class OrderService
{
    protected $repository;
    protected $member;

    public function __construct(OrderRepositoryEloquent $order, MemberRepositoryEloquent $member)
    {
        $this->repository = $order;
        $this->member = $member;
    }

    public function add(Request $request)
    {
        $data = $request->except('_token');
        $member = $this->member->getDetails(['id' => $data['member_id']]);
        $orderInfo = [
            'order_id' => $data['member_id'].time(),
            'member_id' => $data['member_id'],
            'member_group_id' => 1,
            'fullname' => $member['nickname'],
            'total' => $data['total'],
            'telphone' => $member['phone'],
            'member_address_id' => $data['member_address_id'],
            'order_status' => 0,
        ];
        $result = $this->repository->create($orderInfo);
        return $result;
    }
}