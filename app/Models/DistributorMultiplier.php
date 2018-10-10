<?php

namespace App\Models;

use Eloquent as Model;

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

    public $table = 'om_multiplicador_distribuidor';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


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
        'id'                 => 'integer',
        'categoria_producto' => 'integer',
        'distribuidor'       => 'integer',
        'descripcion'        => 'string',
        'porcentaje'         => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'categoria_producto' => 'required|integer',
        'distribuidor'       => 'required|integer',
        'descripcion'        => 'required|string',
        'porcentaje'         => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class, 'categoria_producto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'distribuidor');
    }
}
