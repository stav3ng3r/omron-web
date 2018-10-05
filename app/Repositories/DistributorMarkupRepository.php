<?php

namespace App\Repositories;

use App\Models\DistributorMarkup;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DistributorMarkupRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:02 am UTC
 *
 * @method DistributorMarkup findWithoutFail($id, $columns = ['*'])
 * @method DistributorMarkup find($id, $columns = ['*'])
 * @method DistributorMarkup first($columns = ['*'])
*/
class DistributorMarkupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'distribuidor',
        'porcentaje_envio',
        'porcentaje_aduana',
        'porcentaje_utilidad'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DistributorMarkup::class;
    }
}
