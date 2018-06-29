<?php

namespace App\Http\Controllers\Home;

use App\Formatters\AppFormatter;
use App\Services\MemberAddressService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public $service;
    public $formatter;
    public function __construct(MemberAddressService $memberAddress, AppFormatter $formatter)
    {
        $this->service = $memberAddress;
        $this->formatter = $formatter;
    }

    public function create()
    {
        return view('home.address.create');
    }

    public function store(Request $request)
    {
        try {
            $result = $this->service->add($request);
            if (empty($result)) {
                return response()->json($this->formatter->formatFail(0, [], '添加收货地址失败'));
            }
            return response()->json($this->formatter->format([], '添加收货地址成功'));
        } catch (\Exception $e) {
            return response()->json($this->formatter->formatException($e));
        }
    }
}
