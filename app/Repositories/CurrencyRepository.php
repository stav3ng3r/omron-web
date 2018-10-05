<?php

namespace App\Repositories;

use App\Models\Currency;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CurrencyRepository
 * @package App\Repositories
 * @version October 5, 2018, 2:04 am UTC
 *
 * @method Currency findWithoutFail($id, $columns = ['*'])
 * @method Currency find($id, $columns = ['*'])
 * @method Currency first($columns = ['*'])
*/
class CurrencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'simbolo',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Currency::class;
    }
}
