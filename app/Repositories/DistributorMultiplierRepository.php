<?php

namespace App\Repositories;

use App\Models\DistributorMultiplier;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DistributorMultiplierRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:05 am UTC
 *
 * @method DistributorMultiplier findWithoutFail($id, $columns = ['*'])
 * @method DistributorMultiplier find($id, $columns = ['*'])
 * @method DistributorMultiplier first($columns = ['*'])
*/
class DistributorMultiplierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'categoria_producto',
        'distribuidor',
        'descripcion',
        'porcentaje'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DistributorMultiplier::class;
    }
}
