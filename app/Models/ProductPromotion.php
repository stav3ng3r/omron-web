<?php

namespace App\Models;

use Eloquent as Model;

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
    public $table = 'pr_productos_promocion';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';

    protected $dates = [
        'desde',
        'hasta',
    ];


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
        'id'           => 'integer',
        'id_producto'  => 'integer',
        'distribuidor' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_producto'  => 'required|integer',
        'distribuidor' => 'nullable|integer',
        'desde'        => 'required|date:m/d/Y',
        'hasta'        => 'required|date:m/d/Y',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_producto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'distribuidor');
    }
}
