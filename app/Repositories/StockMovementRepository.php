<?php

namespace App\Repositories;

use App\Models\StockMovement;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StockMovementRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:45 am UTC
 *
 * @method StockMovement findWithoutFail($id, $columns = ['*'])
 * @method StockMovement find($id, $columns = ['*'])
 * @method StockMovement first($columns = ['*'])
*/
class StockMovementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_producto',
        'cantidad',
        'id_comprobante',
        'tipo_movimiento',
        'fecha_creacion',
        'fecha_actualizacion',
        'distribuidor'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StockMovement::class;
    }
}
