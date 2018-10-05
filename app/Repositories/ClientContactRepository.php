<?php

namespace App\Repositories;

use App\Models\ClientContact;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClientContactRepository
 * @package App\Repositories
 * @version October 5, 2018, 1:30 am UTC
 *
 * @method ClientContact findWithoutFail($id, $columns = ['*'])
 * @method ClientContact find($id, $columns = ['*'])
 * @method ClientContact first($columns = ['*'])
*/
class ClientContactRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_cliente',
        'nombre',
        'departamento',
        'email',
        'telefono_contacto',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClientContact::class;
    }
}
