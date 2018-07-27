<?php

namespace App\Console\Commands;

use App\Services\OrderService;
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
                            'member_address_id' => $v['member_address_id'],
                            'total' => 0,
                            'product_id' => $v['product_id']
                        ];
                        $orderModel->addTryOutOrder($orderInfo);
                    }
                }
            }
        }
        BLogger::getLogger('tryout')->info('结算结束');
    }
}

