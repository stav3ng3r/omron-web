<?php

namespace App\Repositories;

use App\Models\ProductAccessory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductAccessoryRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:20 am UTC
 *
 * @method ProductAccessory findWithoutFail($id, $columns = ['*'])
 * @method ProductAccessory find($id, $columns = ['*'])
 * @method ProductAccessory first($columns = ['*'])
*/
class ProductAccessoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigo_producto_principal',
        'codigo_producto_accesorio'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductAccessory::class;
    }
}
