<?php

namespace App\Http\Controllers\Home;

use App\Formatters\AppFormatter;
use App\Services\MemberAddressService;
use App\Services\MemberSnsService;
use App\Services\OrderService;
use App\Services\PaymentService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Factory;

class OrderController extends Controller
{
    public $service;
    public $formatter;

    public function __construct(OrderService $order, AppFormatter $formatter)
    {
        $this->service = $order;
        $this->formatter = $formatter;
    }

    public function index(Request $request)
    {
        $where = [
            'member_id' => session('member.id')
        ];
        $page = 1;
        $limit = 15;
        $orderList = $this->service->getOrderList($where, $page, $limit);
        return view('home.order.index', compact('orderList'));
    }

    public function create(Request $request)
    {
        $id = $request->get('id');
        $productService = app()->make(ProductService::class);
        $product = $productService->getDetails($id);
        $memberAddressService = app()->make(MemberAddressService::class);
        $memberAddress = $memberAddressService->getList(session('member.id'));
        return view('home.order.create', compact('product', 'memberAddress'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            if (empty($data['quantity'])) {
                return response()->json($this->formatter->formatFail(0, [], '购买商品数量不能为空'));
            }
            $result = $this->service->addOrder($data);
            if (empty($result)) {
                return response()->json($this->formatter->formatFail(0, [], '下单失败'));
            }
            return response()->json($this->formatter->format(['order_id' => $result], '下单成功'));
        } catch (\Exception $e) {
            return response()->json($this->formatter->formatException($e));
        }
    }

    public function show(Request $request)
    {
        try {
            $id = $request->input('order_id');
            $orderInfo = $this->service->getOrderInfo($id);
            $memberSnsModel = app()->make(MemberSnsService::class);
            $openid = $memberSnsModel->getMemberOpenid($orderInfo['member_id']);
            $paymentModel = app()->make(PaymentService::class);
            $preOrderInfo = [
                'product_name' => $orderInfo['product'][0]['name'],
                'order_id' => $orderInfo['order_id'],
                'total' => $orderInfo['total']*100,
                'openid' => $openid
            ];

            $preOrder = $paymentModel->createPreOrder($preOrderInfo);
            if (($preOrder['return_code'] == 'SUCCESS') && ($preOrder['return_msg'] == 'OK')) {
                $getJsApiParameters = $paymentModel->getJsApiParameters($preOrder['prepay_id']);
                return view('home.order.show', compact('orderInfo', 'getJsApiParameters'));
            } else {
                return response();
            }
        } catch (\Exception $e) {
            BLogger::getLogger('payment')->info('支付信息：'.json_encode($e));
        }
    }
}
