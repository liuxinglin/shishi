<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Promoter.
 *
 * @package namespace App\Models;
 */
class Promoter extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'bak_promoter';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'nickname',
        'headimg',
        'email',
        'phone',
        'code',
        'commission',
        'status',
        'created_at',
        'updated_at',
        'signed_at',
        'signed_ip',
        'register_ip',
        'last_login_time',
        'last_login_ip',
        'appid'
    ];

    /**
     * 时间转换为时间戳存储
     * @param \DateTime|int $value
     * @return false|int
     */
    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

}
