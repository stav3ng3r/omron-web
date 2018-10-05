<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="StockMovement",
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
 *          property="cantidad",
 *          description="cantidad",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="id_comprobante",
 *          description="id_comprobante",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tipo_movimiento",
 *          description="tipo_movimiento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="distribuidor",
 *          description="distribuidor",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class StockMovement extends Model
{
    use SoftDeletes;

    public $table = 'st_movimiento_stock';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_producto',
        'cantidad',
        'id_comprobante',
        'tipo_movimiento',
        'fecha_creacion',
        'fecha_actualizacion',
        'distribuidor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_producto' => 'integer',
        'cantidad' => 'float',
        'id_comprobante' => 'integer',
        'tipo_movimiento' => 'string',
        'distribuidor' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function prProducto()
    {
        return $this->belongsTo(\App\Models\PrProducto::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function omDistribuidore()
    {
        return $this->belongsTo(\App\Models\OmDistribuidore::class);
    }
}
