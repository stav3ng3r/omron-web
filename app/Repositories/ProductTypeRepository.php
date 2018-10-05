<?php

namespace App\Repositories;

use App\Models\ProductType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductTypeRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:41 am UTC
 *
 * @method ProductType findWithoutFail($id, $columns = ['*'])
 * @method ProductType find($id, $columns = ['*'])
 * @method ProductType first($columns = ['*'])
*/
class ProductTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_categoria',
        'descripcion',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductType::class;
    }
}
