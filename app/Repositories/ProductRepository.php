<?php

namespace App\Repositories;

use App\Models\Product;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductRepository
 * @package App\Repositories
 * @version October 5, 2018, 4:12 am UTC
 *
 * @method Product findWithoutFail($id, $columns = ['*'])
 * @method Product find($id, $columns = ['*'])
 * @method Product first($columns = ['*'])
*/
class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'codigo',
        'codigo_barra',
        'activo',
        'id_producto_tipo',
        'id_producto_marca',
        'id_producto_categoria',
        'precio_venta',
        'tiene_imagen',
        'path_imagen',
        'imagen',
        'fecha_creacion',
        'fecha_actualizacion',
        'fecha_borrado',
        'precio_costo',
        'peso',
        'precio_flete',
        'precio_despacho',
        'precio_costo_con_impuestos'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }
}
