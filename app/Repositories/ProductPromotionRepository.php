<?php

namespace App\Repositories;

use App\Models\ProductPromotion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductPromotionRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:38 am UTC
 *
 * @method ProductPromotion findWithoutFail($id, $columns = ['*'])
 * @method ProductPromotion find($id, $columns = ['*'])
 * @method ProductPromotion first($columns = ['*'])
*/
class ProductPromotionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_producto',
        'desde',
        'hasta',
        'fecha_creacion',
        'distribuidor'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductPromotion::class;
    }
}
