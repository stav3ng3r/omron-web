<?php

namespace App\Repositories;

use App\Models\ProductDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductDetailRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:27 am UTC
 *
 * @method ProductDetail findWithoutFail($id, $columns = ['*'])
 * @method ProductDetail find($id, $columns = ['*'])
 * @method ProductDetail first($columns = ['*'])
*/
class ProductDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_producto',
        'numero_contactos',
        'voltaje_maximo',
        'voltaje_minimo',
        'corriente_minima',
        'corriente_maxima',
        'cantidad_entradas',
        'cantidad_salidas',
        'tipo_terminal',
        'capacidad_memoria',
        'extra1',
        'extra2',
        'extra3',
        'codigo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductDetail::class;
    }
}
