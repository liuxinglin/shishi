<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 2018/6/24
 * Time: 13:17
 */

namespace App\Services;


use App\Repositories\EnrolmentRepositoryEloquent;
use App\Repositories\MemberRepositoryEloquent;
use App\Repositories\VoteRepositoryEloquent;
use Illuminate\Http\Request;

class VoteService
{
    protected $repository;
    public function __construct(VoteRepositoryEloquent $vote)
    {
        $this->repository = $vote;
    }

    public function add(Request $request)
    {
        $data = $request->except('_token');
        //获取投票人详细信息
        app()->bind('MemberService', \App\Services\MemberService::class);
        $model = app()->make('MemberService');
        $memberInfo = $model->getDetails($data['member_id']);

        if (empty($memberInfo)) {
            throw new \Exception('不存在该会员', 1);
        }
        //判断是否投过票
        $isVote = $this->repository->getVoteCount(['member_id' => $data['member_id'], 'enlt_id' => $data['enlt_id']]);
        if (!empty($isVote)) {
            throw new \Exception('您已为该好友投过票', 2);
        }

        //查询是否存在报名信息
        app()->bind('EnrolmentService', \App\Services\EnrolmentService::class);
        $enrolmentModel = app()->make('EnrolmentService');
        $enrolmentInfo = $enrolmentModel->getDetails(['id' => $data['enlt_id']]);
        if (empty($enrolmentInfo)) {
            throw new \Exception('没有该好友报名信息', 3);
        }

        //试用产品信息
        $tryoutInfo = $enrolmentInfo['tryout'];
        if ($tryoutInfo['vote_end_date'] < time()) {
            throw new \Exception('投票时间已过', 3);
        }

        $data['nickname'] = $memberInfo['nickname'];
        $data['headimgurl'] = $memberInfo['headimgurl'];
        $result = $this->repository->create($data);
        if (!empty($result)) {
            $enrolmentModel->incVoteNum(['id' => $data['enlt_id']]);
            $result = $result->toArray();
        }
        return $result;
    }

    public function getVoteList($where, $total = true)
    {
        return $this->repository->getVoteList($where);
    }

    public function getVoteCount($where)
    {
       return $this->repository->getVoteCount($where);
    }
}