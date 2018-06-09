<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BakPermission.
 *
 * @package namespace App\Models;
 */
class BakPermission extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'bak_permission';
    protected $fillable = [
        'id',
        'pid',
        'name',
        'icon',
        'desc',
        'route',
        'is_menu',
        'is_func',
        'color',
        'sort',
        'status',
        'level',
        'appid'
    ];

    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

    /**
     * 权限角色多对多关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\BakRole', 'bak_role_permission', 'permission_id', 'role_id');
    }

}
