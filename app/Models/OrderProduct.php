<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class OrderProduct.
 *
 * @package namespace App\Models;
 */
class OrderProduct extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'ss_order_product';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'preview',
        'quantity',
        'price',
        'total'
    ];
}
