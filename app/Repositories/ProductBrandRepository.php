<?php

namespace App\Repositories;

use App\Models\ProductBrand;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductBrandRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:34 am UTC
 *
 * @method ProductBrand findWithoutFail($id, $columns = ['*'])
 * @method ProductBrand find($id, $columns = ['*'])
 * @method ProductBrand first($columns = ['*'])
*/
class ProductBrandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductBrand::class;
    }
}
