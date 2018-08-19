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
    public function __construct(EnrolmentRepositoryEloquent $enrolment)
    {
        $this->repository = $enrolment;
    }

    public function add($data)
    {
        $memberId = $data['member_id'];
        $tryoutId = $data['tryout_id'];
        //获取报名人详细信息
        app()->bind('MemberService', \App\Services\MemberService::class);
        $model = app()->make('MemberService');
        $memberInfo = $model->getDetails($memberId);
        //获取试用信息
        app()->bind('TryoutProductService', \App\Services\TryoutProductService::class);
        $model = app()->make('TryoutProductService');
        $tryoutInfo = $model->getDetails($tryoutId);

        if (empty($memberInfo['phone'])) {
            throw  new \Exception('请绑定手机号码！', 2);
        }
        //判断是否在报名时间段
        if ((time() < $tryoutInfo['begin_date']) || (time() > $tryoutInfo['end_date'])) {
            throw  new \Exception('不在试用活动期！', 3);
        }

        //判断试用名额是否已满
        if ($tryoutInfo['quantity'] == $tryoutInfo['signup_num']) {
            throw  new \Exception('试用报名人数已满！', 3);
        }
        //判断是否报名
        $enrolmentInfo = $this->repository->getDetails(['tryout_id' => $tryoutId, 'member_id' => $memberId]);
        if (!empty($enrolmentInfo)) {
            throw  new \Exception('您已经参与此次活动！', 1);
        }

        $enrolmentInfo = [
            'member_id' => $memberId,
            'tryout_id' => $tryoutId,
            'nickname' => $memberInfo['nickname'],
            'phone' => $memberInfo['phone'],
            'contacts' => $data['contacts'],
            'area' => $data['area'],
            'address' => $data['address'],
            'product_id' => $tryoutInfo['product_id'],
        ];
        $result = $this->repository->create($enrolmentInfo);
        if (!empty($result)) {
            $result = $result->toArray();
        }
        return $result;
    }

    public function getEnrolmentList($where, $page, $limit, $total = true)
    {
        return $this->repository->getEnrolmentList($where , $page, $limit, $total);
    }

    public function getDetails($where)
    {
        $result = $this->repository->getDetails($where);
        //获取报名人相信信息
        app()->bind('MemberService', \App\Services\MemberService::class);
        $model = app()->make('MemberService');
        $result['member'] = $model->getDetails($result['member_id']);

        //获取试用产品信息
        app()->bind('TryoutProductService', \App\Services\TryoutProductService::class);
        $model = app()->make('TryoutProductService');
        $result['tryout'] = $model->getDetails($result['product_id']);

        //获取投票列表信息
        app()->bind('VoteService', \App\Services\VoteService::class);
        $model = app()->make('VoteService');
        $result['vote']['list'] = $model->getVoteList(['enlt_id' => $result['id']]);

        //获取最大得票数
        $result['vote']['maxVoteNum'] = $this->repository->getMaxVotes(['tryout_id' => $result['tryout_id']]);
        return $result;
    }

    public function incVoteNum($where, $num = 1)
    {
        return $this->repository->increment($where, 'votes_num', $num);
    }

    public function isEnrolment($tryout_id, $member_id)
    {
        $result = $this->repository->getDetails(['member_id' => $member_id, 'tryout_id' => $tryout_id]);
        if (empty($result)) {
            return 0;
        }
        return $result['id'];
    }
}