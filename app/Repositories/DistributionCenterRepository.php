<?php

namespace App\Repositories;

use App\Models\DistributionCenter;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DistributionCenterRepository
 * @package App\Repositories
 * @version October 5, 2018, 2:32 am UTC
 *
 * @method DistributionCenter findWithoutFail($id, $columns = ['*'])
 * @method DistributionCenter find($id, $columns = ['*'])
 * @method DistributionCenter first($columns = ['*'])
*/
class DistributionCenterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'descripcion',
        'pais',
        'ciudad',
        'telefono',
        'direccion_web',
        'marca'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DistributionCenter::class;
    }
}
