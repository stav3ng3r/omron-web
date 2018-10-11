<?php

namespace App\Repositories;

use App\Models\PaymentMethods;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaymentMethodsRepository
 * @package App\Repositories
 * @version October 11, 2018, 9:38 pm UTC
 *
 * @method PaymentMethods findWithoutFail($id, $columns = ['*'])
 * @method PaymentMethods find($id, $columns = ['*'])
 * @method PaymentMethods first($columns = ['*'])
*/
class PaymentMethodsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'dias',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaymentMethods::class;
    }
}
