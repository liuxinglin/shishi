<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Order.
 *
 * @package namespace App\Models;
 */
class Order extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'ss_order';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_type',
        'order_id',
        'member_id',
        'member_group_id',
        'fullname',
        'total',
        'telphone',
        'member_address_id',
        'order_status',
        'is_comment'
    ];
    /**
     * 时间转换为时间戳存储
     * @param \DateTime|int $value
     * @return false|int
     */
    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

    public function product()
    {
        return $this->hasMany('App\Models\OrderProduct', 'order_id', 'order_id');
    }

}
