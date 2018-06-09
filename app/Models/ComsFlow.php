<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComsFlow extends Model
{
    protected $table = 'bak_coms_flow';
    protected $fillable = [
        'pro_id',
        'pro_code',
        'gamer',
        'amount',
        'total_amount',
        'commission',
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
