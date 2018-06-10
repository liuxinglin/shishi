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
}