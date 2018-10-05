<?php

namespace App\Repositories;

use App\Models\CnUser;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CnUserRepository
 * @package App\Repositories
 * @version October 5, 2018, 2:21 am UTC
 *
 * @method CnUser findWithoutFail($id, $columns = ['*'])
 * @method CnUser find($id, $columns = ['*'])
 * @method CnUser first($columns = ['*'])
*/
class CnUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_persona',
        'id_role',
        'id_tipo_usuario',
        'password',
        'usuario',
        'bloqueado',
        'resetear_password',
        'fecha_ultimo_login',
        'fecha_creacion',
        'fecha_actualizacion',
        'fecha_borrado',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CnUser::class;
    }
}
