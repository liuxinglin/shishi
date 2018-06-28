<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class MemberAddress.
 *
 * @package namespace App\Models;
 */
class MemberAddress extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'ss_member_address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contacts',
        'phone',
        'member_id',
        'province',
        'city',
        'county',
        'address',
        'is_default',
        'type',
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
