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

    public function getProductList(Request $request)
    {
        return $this->repository->all();
    }
}