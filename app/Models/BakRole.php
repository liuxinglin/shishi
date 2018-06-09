<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BakRole.
 *
 * @package namespace App\Models;
 */
class BakRole extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'bak_role';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'desc',
        'sort',
        'status',
        'rank',
        'appid'
    ];

    public $timestamps = false;

    /**
     * 角色用户多对多关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\BakUser', 'bak_user_role', 'role_id', 'user_id');
    }

    /**
     * 角色权限多对多关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\BakPermission', 'bak_role_permission', 'role_id', 'permission_id');
    }
}
