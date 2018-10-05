<?php

namespace App\Repositories;

use App\Models\UserType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserTypeRepository
 * @package App\Repositories
 * @version October 5, 2018, 2:17 am UTC
 *
 * @method UserType findWithoutFail($id, $columns = ['*'])
 * @method UserType find($id, $columns = ['*'])
 * @method UserType first($columns = ['*'])
*/
class UserTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserType::class;
    }
}
