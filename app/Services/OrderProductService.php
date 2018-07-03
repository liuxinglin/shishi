<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 18-7-3
 * Time: 下午3:38
 */

namespace App\Services;


use App\Repositories\OrderProductRepositoryEloquent;

class OrderProductService
{
    protected $repository;

    public function __construct(OrderProductRepositoryEloquent $orderProduct)
    {
        $this->repository = $orderProduct;
    }

    public function insertAll($data)
    {
        return $this->repository->insertAll($data);
    }
}