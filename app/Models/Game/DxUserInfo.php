<?php

namespace App\Models\Game;

use Illuminate\Database\Eloquent\Model;

class DxUserInfo extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'DXUserInfo';
    protected $primaryKey = 'UserID';

    protected $fillable = [
        'UserName',
        'Password',
        'Age',
        'TotalPay',
        'IdCardID',
        'PWProtectTime',
        'PhoneNum',
        'MobileNo',
        'UserBirthday',
        'BindActorID',
        'CheckInTime',
        'VouchName',
        'TuiJianRen'
    ];
    public $timestamps = false;
}
