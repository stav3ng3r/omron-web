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
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


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
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'codigo' => 'string',
        'codigo_barra' => 'string',
        'activo' => 'boolean',
        'id_producto_tipo' => 'integer',
        'id_producto_marca' => 'integer',
        'id_producto_categoria' => 'integer',
        'precio_venta' => 'integer',
        'tiene_imagen' => 'boolean',
        'path_imagen' => 'string',
        'imagen' => 'string'
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
    public function prProductosMarca()
    {
        return $this->belongsTo(\App\Models\PrProductosMarca::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function prProductosTipo()
    {
        return $this->belongsTo(\App\Models\PrProductosTipo::class);
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
    public function prProductosDetalles()
    {
        return $this->hasMany(\App\Models\PrProductosDetalle::class);
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
}
