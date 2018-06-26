<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 2018/6/24
 * Time: 9:59
 */

namespace App\Services;


use App\Repositories\EnrolmentRepositoryEloquent;
use App\Repositories\MemberRepositoryEloquent;
use App\Repositories\TryoutProductRepositoryEloquent;
use App\Repositories\VoteRepositoryEloquent;
use Illuminate\Http\Request;

class EnrolmentService
{
    protected $repository;
    protected $tryout;
    protected $member;
    protected $vote;
    public function __construct(EnrolmentRepositoryEloquent $enrolment, TryoutProductRepositoryEloquent $tryout, MemberRepositoryEloquent $member, VoteRepositoryEloquent $vote)
    {
        $this->repository = $enrolment;
        $this->tryout = $tryout;
        $this->member = $member;
        $this->vote = $vote;
    }

    public function add(Request $request)
    {
        $memberId = $request->post('member_id', '');
        $tryoutId = $request->post('tryout_id', '');
        $memberInfo = $this->member->getDetails($memberId);
        $tryoutInfo = $this->tryout->getDetails($tryoutId);
        if (empty($memberInfo['phone'])) {
            throw  new \Exception('请绑定手机号码！', 2);
        }
        //判断是否报名
        $enrolmentInfo = $this->repository->getDetails(['tryout_id' => $tryoutId, 'member_id' => $memberId]);
        if (!empty($enrolmentInfo)) {
            throw  new \Exception('您已经参与此次活动！', 1);
        }
        $data = [
            'member_id' => $memberId,
            'tryout_id' => $tryoutId,
            'nickname' => $memberInfo['nickname'],
            'phone' => $memberInfo['phone'],
            'product_id' => $tryoutInfo['product_id'],
        ];
        $result = $this->repository->create($data);
        if (!empty($result)) {
            $result = $result->toArray();
        }
        return $result;
    }

    public function getDetails(Request $request)
    {
        $id = $request->get('id', '');
        $result = $this->repository->getDetails(['id' => $id]);
        $result['member'] = $this->member->getDetails($result['member_id']);
        $result['tryout'] = $this->tryout->getDetails($result['tryout_id']);
        $result['vote']['list'] = $this->vote->getVoteList(['enlt_id' => $id]);
        $result['vote']['maxVoteNum'] = $this->repository->getMaxVotes(['tryout_id' => $result['tryout_id']]);
        return $result;
    }
}