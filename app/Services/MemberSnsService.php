<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 18-7-16
 * Time: 下午2:23
 */

namespace App\Services;


use App\Repositories\MemberSnsRepositoryEloquent;

class MemberSnsService
{
    protected $repository;

    public function __construct(MemberSnsRepositoryEloquent $memberSns)
    {
        $this->repository = $memberSns;
    }

    public function createMemberSns($data)
    {
        $result = $this->repository->create($data);
        return $result;
    }

    public function getMemberSnsDetails($where)
    {
        $result = $this->repository->getMemberSnsDetails($where);
        return $result;
    }

    public function getMemberOpenid($id)
    {
        $openid = $this->repository->getOpenid($id);
        return $openid;
    }
}