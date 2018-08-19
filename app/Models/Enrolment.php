<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Enrolment.
 *
 * @package namespace App\Models;
 */
class Enrolment extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'ss_enrolment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id',
        'nickname',
        'tryout_id',
        'phone',
        'contacts',
        'area',
        'address',
        'product_id',
        'votes_num'
    ];

    /**
     * 时间转换为时间戳存储
     * @param \DateTime|int $value
     * @return false|int
     */
    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id', 'id');
    }
}
