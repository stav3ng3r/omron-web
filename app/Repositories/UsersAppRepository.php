<?php

namespace App\Repositories;

use App\Models\UsersApp;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UsersAppRepository
 * @package App\Repositories
 * @version October 11, 2018, 9:55 pm UTC
 *
 * @method UsersApp findWithoutFail($id, $columns = ['*'])
 * @method UsersApp find($id, $columns = ['*'])
 * @method UsersApp first($columns = ['*'])
*/
class UsersAppRepository extends BaseRepository
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
        return UsersApp::class;
    }
}
