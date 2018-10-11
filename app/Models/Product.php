<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Product",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="codigo",
 *          description="codigo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="codigo_barra",
 *          description="codigo_barra",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="id_producto_tipo",
 *          description="id_producto_tipo",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_producto_marca",
 *          description="id_producto_marca",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_producto_categoria",
 *          description="id_producto_categoria",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="precio_venta",
 *          description="precio_venta",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tiene_imagen",
 *          description="tiene_imagen",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="path_imagen",
 *          description="path_imagen",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="imagen",
 *          description="imagen",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="precio_costo",
 *          description="precio_costo",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="peso",
 *          description="peso",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="precio_flete",
 *          description="precio_flete",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="precio_despacho",
 *          description="precio_despacho",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="precio_costo_con_impuestos",
 *          description="precio_costo_con_impuestos",
 *          type="number",
 *          format="float"
 *      )
 * )
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'pr_productos';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';
    const DELETED_AT = 'fecha_borrado';


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                    => 'integer',
        'nombre'                => 'string',
        'descripcion'           => 'string',
        'codigo'                => 'string',
        'codigo_barra'          => 'string',
        'activo'                => 'boolean',
        'id_producto_tipo'      => 'integer',
        'id_producto_marca'     => 'integer',
        'id_producto_categoria' => 'integer',
        'precio_venta'          => 'integer',
        'tiene_imagen'          => 'boolean',
        'path_imagen'           => 'string',
        'imagen'                => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre'                => 'required|string',
        'descripcion'           => 'required|string',
        'codigo'                => 'string',
        'activo'                => 'boolean',
        'id_producto_tipo'      => 'required|required|integer',
        'id_producto_marca'     => 'required|integer',
        'id_producto_categoria' => 'required|integer',
        'precio_venta'          => 'required|numeric',
        'path_imagen'           => 'nullable|string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class, 'id_producto_categoria');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'id_producto_marca');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product_type()
    {
        return $this->belongsTo(ProductType::class, 'id_producto_tipo');
    }

    public function accessories()
    {
        return $this->belongsToMany(
            Product::class,
            'pr_productos_accesorios',
            'codigo_producto_principal',
            'codigo_producto_accesorio',
            'codigo',
            'codigo'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function details()
    {
        return $this->hasMany(ProductDetail::class, 'id_producto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cmComprasDetalles()
    {
        return $this->hasMany(\App\Models\CmComprasDetalle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function omPosDetalles()
    {
        return $this->hasMany(\App\Models\OmPosDetalle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function prProductosImagenes()
    {
        return $this->hasMany(\App\Models\PrProductosImagene::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function prProductosPromocions()
    {
        return $this->hasMany(\App\Models\PrProductosPromocion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function stMovimientoStocks()
    {
        return $this->hasMany(\App\Models\StMovimientoStock::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function stStocks()
    {
        return $this->hasMany(\App\Models\StStock::class);
    }

    public function getImageAttribute()
    {
        if ($this->attributes['path_imagen'])
            return $this->attributes['path_imagen'];

        if ($this->attributes['imagen'])
            return base64_decode($this->attributes['imagen']);
    }
}
