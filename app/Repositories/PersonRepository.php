<?php

namespace App\Repositories;

use App\Models\Person;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PersonRepository
 * @package App\Repositories
 * @version October 5, 2018, 2:12 am UTC
 *
 * @method Person findWithoutFail($id, $columns = ['*'])
 * @method Person find($id, $columns = ['*'])
 * @method Person first($columns = ['*'])
*/
class PersonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'numero_documento',
        'telefono_contacto',
        'email',
        'fecha_ingreso',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Person::class;
    }
}
