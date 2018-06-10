<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Models;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'ss_product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cate_id',
        'name',
        'description',
        'quantity',
        'image',
        'price',
        'sort',
        'status',
        'viewed'
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
