<?php

namespace App\Repositories;

use App\Models\Stock;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StockRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:48 am UTC
 *
 * @method Stock findWithoutFail($id, $columns = ['*'])
 * @method Stock find($id, $columns = ['*'])
 * @method Stock first($columns = ['*'])
*/
class StockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_producto',
        'cantidad',
        'en_stock',
        'cantidad_minima',
        'fecha_creacion',
        'fecha_actualizacion',
        'distribuidor'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Stock::class;
    }
}
