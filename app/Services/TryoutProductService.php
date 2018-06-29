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

class TryoutProductService
{
    protected $repository;
    public function __construct(
        TryoutProductRepositoryEloquent $repository,
        EnrolmentRepositoryEloquent $enrolment,
        CommentRepositoryEloquent $comment
    )
    {
        $this->repository = $repository;
        $this->enrolment = $enrolment;
        $this->comment = $comment;
    }

    public function getTryoutProductList(Request $request)
    {
        return $this->repository->getList();
    }

    public function getDetails(Request $request)
    {
        $id = $request->get('id', '');
        $result = $this->repository->getDetails($id);
        //查询报名信息
        $result['enrolments'] = $this->enrolment->getList(['tryout_id' => $result['id']], true);
        //查询评论信息
        $result['comments'] = $this->comment->getList(['product_id' => $result['product_id']], true);
        return $result;
    }
}