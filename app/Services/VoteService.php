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
    protected $member;
    protected $enrolment;
    public function __construct(VoteRepositoryEloquent $vote, MemberRepositoryEloquent $member, EnrolmentRepositoryEloquent $enrolment)
    {
        $this->repository = $vote;
        $this->member = $member;
        $this->enrolment = $enrolment;
    }

    public function add(Request $request)
    {
        $data = $request->except('_token');
        $memberInfo = $this->member->getDetails($data['member_id']);

        if (empty($memberInfo)) {
            throw new \Exception('不存在该会员', 1);
        }
        //判断是否投过票
        $isVote = $this->repository->getVoteCount(['member_id' => $data['member_id'], 'enlt_id' => $data['enlt_id']]);
        if (!empty($isVote)) {
            throw new \Exception('您已为该好友投过票', 2);
        }
        $data['nickname'] = $memberInfo['nickname'];
        $data['headimgurl'] = $memberInfo['headimgurl'];
        $result = $this->repository->create($data);
        if (!empty($result)) {
            $this->enrolment->increment(['id' => $data['enlt_id']], 'votes_num', 1);
        }
        return true;
    }

    public function getVoteCount($where)
    {
       return $this->repository->getVoteCount($where);
    }
}