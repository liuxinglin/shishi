<?php

namespace App\Http\Controllers\Home;

use App\Formatters\AppFormatter;
use App\Services\EnrolmentService;
use EasyWeChat\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnrolmentController extends Controller
{
    public $service;
    public $formatter;
    public function __construct(EnrolmentService $service, AppFormatter $formatter)
    {
        $this->service = $service;
        $this->formatter = $formatter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            $result = $this->service->add($data);
            if (empty($result)) {
                return response()->json($this->formatter->formatFail(0, [], '报名失败'));
            }
            return response()->json($this->formatter->format($result, '报名成功'));
        } catch (\Exception $e) {
            return response()->json($this->formatter->formatException($e));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = $request->all();
        $where = [];
        if (isset($data['id'])) {
            $where['id'] = $data['id'];
        }

        if (isset($data['member_id'])) {
            $where['member_id'] = $data['member_id'];
        }

        if (isset($data['tryout_id'])) {
            $where['tryout_id'] = $data['tryout_id'];
        }
        $data = $this->service->getDetails($where);
        $config = config('wechat.official_account.default');
        $app = Factory::officialAccount($config);
        return view('home.enrolment.show', compact('data', 'app'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
