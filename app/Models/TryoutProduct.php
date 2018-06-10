<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TryoutProduct.
 *
 * @package namespace App\Models;
 */
class TryoutProduct extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'ss_tryout_product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'quantity',
        'signup_num',
        'begin_date',
        'end_date',
        'vote_end_date',
        'status',
        'created_at',
        'updated_at'
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