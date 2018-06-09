<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BakPermissionRepository;
use App\Models\BakPermission;
use App\Validators\BakPermissionValidator;

/**
 * Class BakPermissionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BakPermissionRepositoryEloquent extends BaseRepository implements BakPermissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BakPermission::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
