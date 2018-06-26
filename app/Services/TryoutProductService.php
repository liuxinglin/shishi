<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 2018/6/10
 * Time: 12:08
 */

namespace App\Services;


use App\Repositories\TryoutProductRepositoryEloquent;
use Illuminate\Http\Request;

class TryoutProductService
{
    protected $repository;
    public function __construct(TryoutProductRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function getTryoutProductList(Request $request)
    {
        return $this->repository->getList();
    }

    public function getDetails(Request $request)
    {
        $id = $request->get('id', '');
        return $this->repository->getDetails($id);
    }
}