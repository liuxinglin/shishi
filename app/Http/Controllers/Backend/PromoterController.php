<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\PromoterRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromoterController extends Controller
{
    protected $promoter;
    public function __construct(PromoterRepositoryEloquent $promoter)
    {
        $this->promoter = $promoter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = $this->promoter->all()->toArray();
            return response()->json(['code'=>0, 'msg'=>'请求数据成功', 'count'=>100, 'data' => $data]);
        }

        return view('backend.promoter.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.promoter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = md5($data['password']);
        $data['register_ip'] = $request->getClientIp();
        $result = $this->promoter->create($data);
        if(!$result) {
            return response()->json(['code' => 404, 'msg' => '新增推广员失败']);
        }
        return response()->json(['code' => 0, 'msg' => '新增推广员成功']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
