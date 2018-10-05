<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ProductPromotion",
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
 *          property="distribuidor",
 *          description="distribuidor",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class ProductPromotion extends Model
{
    use SoftDeletes;

    public $table = 'pr_productos_promocion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_producto',
        'desde',
        'hasta',
        'fecha_creacion',
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
