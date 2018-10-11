<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="ProductImage",
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
 *          property="url_imagen",
 *          description="url_imagen",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="codigo",
 *          description="codigo",
 *          type="string"
 *      )
 * )
 */
class ProductImage extends Model
{
    public $table = 'pr_productos_imagenes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'id_producto',
        'url_imagen',
        'codigo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'id_producto' => 'integer',
        'url_imagen'  => 'string',
        'codigo'      => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image_url' => 'required|string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_producto');
    }
}
