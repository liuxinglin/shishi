<?php

namespace App\Console\Commands;

use App\Services\CouponCodeService;
use App\Services\MemberCouponService;
use App\Services\OrderService;
use App\Services\VoteService;
use App\Tool\BLogger;
use Illuminate\Console\Command;

class CloseTryout extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tryout:close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '试用活动结算';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        BLogger::getLogger('tryout')->info('进入结算');
        //查询当前结束的试用活动
        app()->bind('TryoutProductService', \App\Services\TryoutProductService::class);
        $tryoutModel = app()->make('TryoutProductService');
        app()->bind('EnrolmentService', \App\Services\EnrolmentService::class);
        $enrolmentModel = app()->make('EnrolmentService');
        app()->bind('OrderService', OrderService::class);
        $orderModel = app()->make('OrderService');
        $time = strtotime(date('Y-m-d H:i'));
        $where = [
            'between' => [$time-10*60, $time]
        ];
        $tryoutList = $tryoutModel->getTryoutProductList($where);
        BLogger::getLogger('tryout')->info('试用信息：'.json_encode($tryoutList));
        if(!empty($tryoutList)) {
            foreach ($tryoutList as $value) {
                $where = [
                    'tryout_id' => $value['id']
                ];
                //查询得票前15名的用户
                $enrolmentList = $enrolmentModel->getEnrolmentList($where, 0, 15, false);
                BLogger::getLogger('tryout')->info('报名信息：'.json_encode($enrolmentList));
                if (!empty($enrolmentList['list'])) {
                    //生成订单
                    foreach ($enrolmentList['list'] as $v) {
                        $orderInfo = [
                            'member_id' => $v['member_id'],
                            'nickname' => $v['nickname'],
                            'area' => $v['area'],
                            'address' => $v['address'],
                            'total' => 0,
                            'product_id' => $v['product_id']
                        ];
                        $orderModel->addTryOutOrder($orderInfo);
                    }
                    //获取参与投票用户
                    $enrolmentIds = array_column($enrolmentList['list'], 'member_id');
                    app()->bind('VoteService', VoteService::class);
                    $voteModel = app()->make('VoteService');
                    $voteList = $voteModel->getVoteList(['in' => $enrolmentIds]);
                    $voteIds = array_column($voteList, 'member_id');
                    if (!empty($voteList)) {
                        //生成优惠码
                        app()->bind('CouponCodeService', CouponCodeService::class);
                        $couponCodeModel = app()->make('CouponCodeService');
                        $couponCodeList = $couponCodeModel->createCouponCode(count($voteList), '', 6);
                        $couponCodeData = [];
                        $memberCouponData = [];
                        foreach ($couponCodeList as $key => $value) {
                            $arr = [
                                'coupon_id' => 1,
                                'coupon_code' => $value,
                                'coupon_code_status' => 1,
                                'created_at' => time(),
                                'updated_at' => time(),
                            ];
                            $memberCouponArr = [
                                'member_id' => $voteIds[$key],
                                'coupon_id' => 1,
                                'coupon_code' => $value,
                                'member_coupon_status' => 0,
                                'created_at' => time(),
                                'updated_at' => time(),
                            ];
                            $couponCodeData[] = $arr;
                            $memberCouponData[] = $memberCouponArr;
                        }
                        $couponCodeModel->insertAll($couponCodeData);
                        //给投票用户发放优惠码
                        app()->bind('MemberCouponService', MemberCouponService::class);
                        $memberCouponModel = app()->make('MemberCouponService');
                        $memberCouponModel->insertAll($memberCouponData);
                    }
                }
            }
        }
        BLogger::getLogger('tryout')->info('结算结束');
    }
}

