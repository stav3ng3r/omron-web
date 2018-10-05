<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductCategoryRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:23 am UTC
 *
 * @method ProductCategory findWithoutFail($id, $columns = ['*'])
 * @method ProductCategory find($id, $columns = ['*'])
 * @method ProductCategory first($columns = ['*'])
*/
class ProductCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_marca',
        'descripcion',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductCategory::class;
    }
}
