<?php

namespace App\Repositories;

use App\Models\Country;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CountryRepository
 * @package App\Repositories
 * @version October 5, 2018, 2:08 am UTC
 *
 * @method Country findWithoutFail($id, $columns = ['*'])
 * @method Country find($id, $columns = ['*'])
 * @method Country first($columns = ['*'])
*/
class CountryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'abreviatura',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Country::class;
    }
}
