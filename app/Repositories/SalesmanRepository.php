<?php

namespace App\Repositories;

use App\Models\Salesman;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SalesmanRepository
 * @package App\Repositories
 * @version October 5, 2018, 2:28 am UTC
 *
 * @method Salesman findWithoutFail($id, $columns = ['*'])
 * @method Salesman find($id, $columns = ['*'])
 * @method Salesman first($columns = ['*'])
*/
class SalesmanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_persona',
        'activo',
        'porcentaje_comision',
        'fecha_creacion',
        'meta',
        'fecha_actualizacion',
        'fecha_borrado',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Salesman::class;
    }
}
