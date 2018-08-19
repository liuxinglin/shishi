<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 2018/6/28
 * Time: 22:51
 */

namespace App\Services;


use App\Repositories\MemberAddressRepositoryEloquent;
use Illuminate\Http\Request;

class MemberAddressService
{
    protected $repository;
    public function __construct(MemberAddressRepositoryEloquent $memberAddress)
    {
        $this->repository = $memberAddress;
    }

    public function getList($memberId)
    {
        $result = $this->repository->findWhere(['member_id' => $memberId])->toArray();
        return $result;
    }

    public function add(Request $request)
    {
        $data = $request->except('_token');
        $data['province'] = '广东省';
        $data['city'] = '深圳市';
        $data['county'] = '南山区';
        $data['area'] = $data['province'].$data['city'].$data['county'];
        $data['type'] = 1;
        $result = $this->repository->create($data);
        if(!empty($result)) {
            $result = $result->toArray();
        }
        return $result;
    }

    public function getAddressInfo($where)
    {
        return $this->repository->getAddressInfo($where);
    }
}