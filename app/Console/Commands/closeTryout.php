<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class closeTryout extends Command
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
        //查询当前结束的试用活动
        app()->bind('TryoutProductService', \App\Services\TryoutProductService::class);
        $tryoutModel = app()->make('TryoutProductService');
        $where = [
            'vote_end_date' => time()
        ];
        $tryoutList = $tryoutModel->getTryoutProductList($where);
        foreach ($tryoutList as $value) {

        }
    }
}
