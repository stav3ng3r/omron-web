<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ProductDetail",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_producto",
 *          description="id_producto",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="numero_contactos",
 *          description="numero_contactos",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="voltaje_maximo",
 *          description="voltaje_maximo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="voltaje_minimo",
 *          description="voltaje_minimo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="corriente_minima",
 *          description="corriente_minima",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="corriente_maxima",
 *          description="corriente_maxima",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cantidad_entradas",
 *          description="cantidad_entradas",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cantidad_salidas",
 *          description="cantidad_salidas",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipo_terminal",
 *          description="tipo_terminal",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="capacidad_memoria",
 *          description="capacidad_memoria",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="extra1",
 *          description="extra1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="extra2",
 *          description="extra2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="extra3",
 *          description="extra3",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="codigo",
 *          description="codigo",
 *          type="string"
 *      )
 * )
 */
class ProductDetail extends Model
{

    public $table = 'pr_productos_detalle';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'id_producto'       => 'integer',
        'numero_contactos'  => 'string',
        'voltaje_maximo'    => 'string',
        'voltaje_minimo'    => 'string',
        'corriente_minima'  => 'string',
        'corriente_maxima'  => 'string',
        'cantidad_entradas' => 'string',
        'cantidad_salidas'  => 'string',
        'tipo_terminal'     => 'string',
        'capacidad_memoria' => 'string',
        'extra1'            => 'string',
        'extra2'            => 'string',
        'extra3'            => 'string',
        'codigo'            => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'numero_contactos'  => 'string',
//        'voltaje_maximo'    => 'string',
//        'voltaje_minimo'    => 'string',
//        'corriente_minima'  => 'string',
//        'corriente_maxima'  => 'string',
//        'cantidad_entradas' => 'string',
//        'cantidad_salidas'  => 'string',
//        'tipo_terminal'     => 'string',
//        'capacidad_memoria' => 'string',
//        'extra1'            => 'string',
//        'extra2'            => 'string',
//        'extra3'            => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_producto');
    }
}
