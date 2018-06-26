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

    public function login(Request $request)
    {
        $data = $request->except('_token');
        $result = $this->repository->findWhere(['username' => $data['phone']])->toArray();
        if(empty($result)) {
            throw new \Exception('不存在该账号');
        }
        $member = $result['0'];
        if($member['password'] != $data['password']) {
            throw new \Exception('密码错误');
        }

        if($member['status'] == 0) {
            throw new \Exception('该账号已被禁用');
        }
        session(['memberID' => $member['id']]);
        //登录成功更新信息
        $upInfo = [
            'last_login_time' => $member['signed_at'],
            'last_login_ip' => $member['signed_ip'],
            'signed_at' => date('Y-m-d H:i:s'),
            'signed_ip' => $request->getClientIp()
        ];

        $this->repository->update($upInfo, $member['id']);
    }

    public function bindPhone(Request $request)
    {
        $data = $request->except('_token');
        if (empty($data['phone'])) {
            throw  new \Exception('手机号码不能为空', 1);
        }
        $result = $this->repository->update(['phone' => $data['phone']], $data['member_id']);
        return $result;
    }
}