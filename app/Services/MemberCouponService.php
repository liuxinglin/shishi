<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 18-7-30
 * Time: 下午5:31
 */

namespace App\Services;


use App\Repositories\MemberCouponRepositoryEloquent;

class MemberCouponService
{
    protected $repository;

    public function __construct(MemberCouponRepositoryEloquent $memberCoupon)
    {
        $this->repository = $memberCoupon;
    }

    public function insertAll($data)
    {
        return $this->repository->insertAll($data);
    }

    public function getCouponList($where)
    {
        return $this->repository->getCouponList($where);
    }
}