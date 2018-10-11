<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ProductAccessory",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="codigo_producto_principal",
 *          description="codigo_producto_principal",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="codigo_producto_accesorio",
 *          description="codigo_producto_accesorio",
 *          type="string"
 *      )
 * )
 */
class ProductAccessory extends Model
{
    use SoftDeletes;

    public $table = 'pr_productos_accesorios';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo_producto_principal',
        'codigo_producto_accesorio',
        'id_producto',
        'id_accesorio',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                        => 'integer',
        'codigo_producto_principal' => 'string',
        'codigo_producto_accesorio' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
