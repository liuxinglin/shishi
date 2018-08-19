<?php
namespace App\Services;
use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 2018/6/9
 * Time: 11:49
 */
class ProductService
{
    protected $repository;
    public function __construct(ProductRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function getProductList($where)
    {
        return $this->repository->all();
    }

    public function getDetails($id)
    {
        $result = $this->repository->getDetails(['id' => $id]);
        //查询评论信息
        app()->bind('CommentService', \App\Services\CommentService::class);
        $model = app()->make('CommentService');
        $result['comments'] = $model->getCommentList(['product_id' => $result['id']], true);
        return $result;
    }
}