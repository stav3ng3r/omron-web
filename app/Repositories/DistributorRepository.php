<?php

namespace App\Repositories;

use App\Models\Distributor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DistributorRepository
 * @package App\Repositories
 * @version October 5, 2018, 2:36 am UTC
 *
 * @method Distributor findWithoutFail($id, $columns = ['*'])
 * @method Distributor find($id, $columns = ['*'])
 * @method Distributor first($columns = ['*'])
*/
class DistributorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'descripcion',
        'pais',
        'ciudad',
        'direccion',
        'oficina_regional',
        'marca'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Distributor::class;
    }
}
