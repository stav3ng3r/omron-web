<?php

namespace App\Repositories;

use App\Models\ClientPaymentMethod;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClientPaymentMethodRepository
 * @package App\Repositories
 * @version October 5, 2018, 2:00 am UTC
 *
 * @method ClientPaymentMethod findWithoutFail($id, $columns = ['*'])
 * @method ClientPaymentMethod find($id, $columns = ['*'])
 * @method ClientPaymentMethod first($columns = ['*'])
*/
class ClientPaymentMethodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'distribuidor',
        'cliente',
        'forma_de_pago'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClientPaymentMethod::class;
    }
}
