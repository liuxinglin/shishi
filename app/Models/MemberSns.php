<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class MemberSns.
 *
 * @package namespace App\Models;
 */
class MemberSns extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'ss_member_sns';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id',
        'openid',
        'unionid',
        'nickname',
        'sex',
        'headimgurl',
        'platform'
    ];

}
