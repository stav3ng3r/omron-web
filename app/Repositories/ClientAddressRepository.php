<?php

namespace App\Repositories;

use App\Models\ClientAddress;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClientAddressRepository
 * @package App\Repositories
 * @version October 5, 2018, 1:38 am UTC
 *
 * @method ClientAddress findWithoutFail($id, $columns = ['*'])
 * @method ClientAddress find($id, $columns = ['*'])
 * @method ClientAddress first($columns = ['*'])
*/
class ClientAddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'pais',
        'ciudad',
        'direccion_entrega',
        'telefono_entrega',
        'contacto_entrega',
        'cliente'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClientAddress::class;
    }
}
