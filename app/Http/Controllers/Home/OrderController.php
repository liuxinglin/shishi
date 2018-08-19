<?php

namespace App\Http\Controllers\Home;

use App\Formatters\AppFormatter;
use App\Services\MemberAddressService;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            return response()->json($this->formatter->format([], '下单成功'));
        } catch (\Exception $e) {
            return response()->json($this->formatter->formatException($e));
        }
    }
}
