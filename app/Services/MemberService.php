<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 2018/6/10
 * Time: 10:29
 */

namespace App\Services;


use App\Repositories\MemberRepositoryEloquent;
use Illuminate\Http\Request;

class MemberService
{
    protected $repository;
    public function __construct(MemberRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function addMember(Request $request)
    {
        return true;
    }

    public function loginBySNS()
    {

    }

    public function bindPhone(Request $request)
    {
        $data = $request->except('_token');
        if (empty($data['phone'])) {
            throw  new \Exception('电手机号码不能为空', 1);
        }
        $result = $this->repository->update(['phone' => $data['phone']], $data['member_id']);
        return $result;
    }
}