<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TryoutProductRepository;
use App\Models\TryoutProduct;
use App\Validators\TryoutProductValidator;

/**
 * Class TryoutProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TryoutProductRepositoryEloquent extends BaseRepository implements TryoutProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TryoutProduct::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getList()
    {
        $result = $this->model->leftJoin('ss_product', 'ss_tryout_product.product_id', '=', 'ss_product.id')
            ->where('ss_tryout_product.begin_date', '<=', time())
            ->where('ss_tryout_product.status', 1)
            ->select('ss_tryout_product.*', 'ss_product.name', 'ss_product.description','ss_product.image')
            ->get()
            ->toArray();
        return $result;
    }

    public function getDetails($id)
    {
        $result = $this->model->leftJoin('ss_product', 'ss_tryout_product.product_id', '=', 'ss_product.id')
            ->where('ss_tryout_product.id', $id)
            ->select('ss_tryout_product.*', 'ss_product.name', 'ss_product.description','ss_product.image','ss_product.price')
            ->first();
        if (!empty($result)) {
            $result = $result->toArray();
        }
        return $result;
    }
}
