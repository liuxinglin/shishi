<?php

namespace App\Http\Controllers\Home;

use App\Formatters\AppFormatter;
use App\Services\CommentService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public $service;
    public $formatter;
    public function __construct(CommentService $comment, AppFormatter $formatter)
    {
        $this->service = $comment;
        $this->formatter = $formatter;
    }

    public function index(Request $request)
    {
        $where = $request->except('token');
        $data = $this->service->getCommentList($where);
        return view('home.comment.index', compact('data'));
    }

    public function create(Request $request)
    {
        $orderId = $request->get('order_id');
        app()->bind('OrderService', OrderService::class);
        $orderModel = app()->make('OrderService');
        $orderInfo = $orderModel->getOrderInfo($orderId);
        return view('home.comment.create', compact('orderInfo'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            $result = $this->service->add($data);
            if(empty($result)) {
                return $this->formatter->formatFail(0, [], '评论失败');
            }
            return $this->formatter->format([], '评论成功');
        } catch (\Exception $e) {
            return $this->formatter->formatException($e);
        }
    }
}
