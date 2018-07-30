<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Coupon.
 *
 * @package namespace App\Models;
 */
class Coupon extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'ss_coupon';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coupon_name',
        'coupon_send_type',
        'coupon_setting_type',
        'coupon_money',
        'coupon_use_amounts',
        'coupon_discount',
        'coupon_number',
        'coupon_receive_num',
        'coupon_start_time',
        'coupon_end_time',
        'coupon_start_period',
        'coupon_end_period',
        'coupon_status',
        'coupon_remarks',
        'coupon_ids',
        'created_at',
        'updated_at',
        'is_delete'
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
