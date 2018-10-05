<?php

namespace App\Repositories;

use App\Models\ProductImage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductImageRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:31 am UTC
 *
 * @method ProductImage findWithoutFail($id, $columns = ['*'])
 * @method ProductImage find($id, $columns = ['*'])
 * @method ProductImage first($columns = ['*'])
*/
class ProductImageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_producto',
        'url_imagen',
        'codigo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductImage::class;
    }
}
