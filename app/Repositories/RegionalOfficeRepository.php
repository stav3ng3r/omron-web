<?php

namespace App\Repositories;

use App\Models\RegionalOffice;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RegionalOfficeRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:09 am UTC
 *
 * @method RegionalOffice findWithoutFail($id, $columns = ['*'])
 * @method RegionalOffice find($id, $columns = ['*'])
 * @method RegionalOffice first($columns = ['*'])
*/
class RegionalOfficeRepository extends BaseRepository
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
        'telefono',
        'centro_distribucion',
        'marca'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RegionalOffice::class;
    }
}
