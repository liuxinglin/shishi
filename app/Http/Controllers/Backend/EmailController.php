<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        phpinfo();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.email.create');
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
        $data['PlusTicket'] = 0;
        //没有自定义发送邮件对象
        if(empty($data['ToActorIDs'])) {
            $gamerList = DB::connection('sqlsrv2')->select("exec PrGs_GetUserRole_By_Web ?,?,?,?,?,?,?",['0','0','0','0',$data['grade_min'],$data['grade_max'],'']);
            $gamerIds = [];
            foreach ($gamerList as $value) {
                array_push($gamerIds, $value->ActorID);
            }
            $data['ToActorIDs'] = implode('|', $gamerIds);
        }
        //发送邮件
        $result = DB::connection('sqlsrv2')->select("exec PrGs_Email_Send_By_Web ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?", [$data['EMailType'], '0', '系统邮件', $data['ToActorIDs'],
            $data['EMailTopic'], $data['MailContext'], $data['PlusMoney'], $data['PlusTicket'], $data['PlusExp'], '0', $data['HasPlusData'], '0', time(), $data['LifeTime'], '0',
            $data['GoodsCount'], (int)$data['GoodsData']]);

        if(empty($result)) {
            return response()->json(['code' => 404, 'msg' => '发送邮件失败']);
        }
        return response()->json(['code' => 0, 'msg' => '发送邮件成功']);
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
