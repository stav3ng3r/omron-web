<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="DistributorMultiplier",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="categoria_producto",
 *          description="categoria_producto",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="distribuidor",
 *          description="distribuidor",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="porcentaje",
 *          description="porcentaje",
 *          type="number",
 *          format="float"
 *      )
 * )
 */
class DistributorMultiplier extends Model
{
    use SoftDeletes;

    public $table = 'om_multiplicador_distribuidor';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'categoria_producto',
        'distribuidor',
        'descripcion',
        'porcentaje'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categoria_producto' => 'integer',
        'distribuidor' => 'integer',
        'descripcion' => 'string',
        'porcentaje' => 'float'
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
    public function prProductosCategoria()
    {
        return $this->belongsTo(\App\Models\PrProductosCategoria::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function omDistribuidore()
    {
        return $this->belongsTo(\App\Models\OmDistribuidore::class);
    }
}
