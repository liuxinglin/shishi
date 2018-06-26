<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Vote.
 *
 * @package namespace App\Models;
 */
class Vote extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'ss_vote_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enlt_id',
        'nickname',
        'headimgurl',
        'member_id'
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
