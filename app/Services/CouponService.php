<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 18-7-30
 * Time: 下午5:12
 */

namespace App\Services;


use App\Repositories\CouponRepositoryEloquent;

class CouponService
{
    protected $repository;

    public function __construct(CouponRepositoryEloquent $coupon)
    {
        $this->repository = $coupon;
    }
}