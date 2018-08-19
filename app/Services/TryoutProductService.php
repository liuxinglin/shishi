<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 2018/6/10
 * Time: 12:08
 */

namespace App\Services;


use App\Repositories\CommentRepositoryEloquent;
use App\Repositories\EnrolmentRepositoryEloquent;
use App\Repositories\TryoutProductRepositoryEloquent;
use Illuminate\Http\Request;
use function Psy\bin;

class TryoutProductService
{
    protected $repository;
    public function __construct(TryoutProductRepositoryEloquent $repository)
    {
        $this->repository = $repository;

    }


    public function getTryoutProductList($where)
    {
        return $this->repository->getList($where);
    }

    public function getDetails($id)
    {
        $result = $this->repository->getDetails((int)$id);
        //查询报名信息
        app()->bind('EnrolmentService', \App\Services\EnrolmentService::class);
        $model = app()->make('EnrolmentService');
        $result['enrolments'] = $model->getEnrolmentList(['tryout_id' => $result['id']], 0, 5, true);
        //查询评论信息
        app()->bind('CommentService', \App\Services\CommentService::class);
        $model = app()->make('CommentService');
        $result['comments'] = $model->getCommentList(['product_id' => $result['product_id']], true);
        return $result;
    }
}