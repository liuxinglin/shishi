<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 18-6-27
 * Time: 下午3:19
 */

namespace App\Services;


use App\Repositories\CommentRepositoryEloquent;
use Illuminate\Http\Request;

class CommentService
{
    protected $repository;
    public function __construct(CommentRepositoryEloquent $comment)
    {
        $this->repository = $comment;
    }

    public function add($data)
    {
        //获取会员详细信息
        app()->bind('MemberService', \App\Services\MemberService::class);
        $model = app()->make('MemberService');
        $memberInfo = $model->getDetails($data['member_id']);
        $data['nickname'] = $memberInfo['nickname'];
        $data['headimgurl'] = $memberInfo['headimgurl'];
        $data['status'] = 0;
        $result = $this->repository->create($data);
        if (!empty($result)) {
            app()->bind('OrderService', \App\Services\OrderService::class);
            $orderModel = app()->make('OrderService');
            $orderModel->updateCommentStatus($data['order_id'], 1);
        }
        return $result;
    }

    public function getCommentList($where, $total = true)
    {
        return $this->repository->getList($where, $total);
    }
}