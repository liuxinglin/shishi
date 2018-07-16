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
        $result = $this->repository->getDetails(['username' => $data['phone']]);
        if(empty($result)) {
            throw new \Exception('不存在该账号');
        }
        if($result['password'] != $data['password']) {
            throw new \Exception('密码错误');
        }

        if($result['status'] == 0) {
            throw new \Exception('该账号已被禁用');
        }
        session([
            'member' => [
                'id' => $result['id'],
                'nickname' => $result['nickname'],
                'headimgurl' => $result['headimgurl']
            ]
        ]);
        //登录成功更新信息
        $upInfo = [
            'last_login_time' => $result['signed_at'],
            'last_login_ip' => $result['signed_ip'],
            'signed_at' => date('Y-m-d H:i:s'),
            'signed_ip' => $request->getClientIp()
        ];

        $this->repository->update($upInfo, $result['id']);
        return $result;
    }

    public function register(Request $request)
    {
        $data = $request->except('_token');
        if (empty($data['phone'])) {
           throw new \Exception('手机号码不能为空');
        }
        if (empty($data['password'])) {
            throw new \Exception('密码不能为空');
        }
        $memberInfo = [
            'username' => $data['phone'],
            'password' => $data['password'],
            'phone' => $data['phone'],
        ];
        $result = $this->repository->create($memberInfo);
        if (empty($result)) {
           return false;
        }
        return $result->toArray();
    }

    public function bindPhone(Request $request)
    {
        $data = $request->except('_token');
        if (empty($data['phone'])) {
            throw  new \Exception('手机号码不能为空', 1);
        }
        $result = $this->repository->update(['phone' => $data['phone']], $data['member_id']);
        if (empty($result)) {
            return false;
        }
        return $result;
    }

    public function loginBySns($user)
    {
        $memberSnsService = app()->make(MemberSnsService::class);
        $memberSnsInfo = $memberSnsService->getMemberSnsDetails(['unionid' => $user['unionid'], 'platform' => $user['platform']]);
        if (empty($memberSnsInfo)) {
            $memberInfo = [
                'username' => $user['unionid'],
                'password' => md5('123456a'),
                'nickname' => $user['nickname'],
                'sex' => $user['sex'],
                'headimgurl' => $user['headimgurl'],
                'status' => 1
            ];
            $result = $this->repository->create($memberInfo);
            if (empty($result)) {
                throw new \Exception('新增会员失败');
            }
            $user['member_id'] = $result['id'];
            $result1 = $memberSnsService->createMemberSns($user);
            if (empty($result1)) {
                throw new \Exception('新增会员第三方登录信息失败');
            }
        }
        $memberInfo = $this->repository->getDetails(['id' => $memberSnsInfo['member_id']]);
        session([
            'member' => [
                'id' => $memberInfo['id'],
                'nickname' => $memberInfo['nickname'],
                'headimgurl' => $memberInfo['headimgurl']
            ]
        ]);
    }

    public function getDetails($id)
    {
        $result = $this->repository->getDetails(['id' => $id]);
        return $result;
    }
}