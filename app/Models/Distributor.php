<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Distributor",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="titulo",
 *          description="titulo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pais",
 *          description="pais",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ciudad",
 *          description="ciudad",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="oficina_regional",
 *          description="oficina_regional",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="marca",
 *          description="marca",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Distributor extends Model
{
    use SoftDeletes;

    public $table = 'om_distribuidores';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'descripcion',
        'pais',
        'ciudad',
        'direccion',
        'oficina_regional',
        'marca'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titulo' => 'string',
        'descripcion' => 'string',
        'pais' => 'integer',
        'ciudad' => 'integer',
        'direccion' => 'string',
        'oficina_regional' => 'integer',
        'marca' => 'integer'
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
    public function cnCiudade()
    {
        return $this->belongsTo(\App\Models\CnCiudade::class);
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
    public function omOficinasRegionale()
    {
        return $this->belongsTo(\App\Models\OmOficinasRegionale::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cnPai()
    {
        return $this->belongsTo(\App\Models\CnPai::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cmComprasCabeceras()
    {
        return $this->hasMany(\App\Models\CmComprasCabecera::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cnClientesFormaPagos()
    {
        return $this->hasMany(\App\Models\CnClientesFormaPago::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function omMarkupDistribuidores()
    {
        return $this->hasMany(\App\Models\OmMarkupDistribuidore::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function omMultiplicadorDistribuidors()
    {
        return $this->hasMany(\App\Models\OmMultiplicadorDistribuidor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function omPosCabeceras()
    {
        return $this->hasMany(\App\Models\OmPosCabecera::class);
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
    public function prProductosPromocions()
    {
        return $this->hasMany(\App\Models\PrProductosPromocion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cnClientes()
    {
        return $this->hasMany(\App\Models\CnCliente::class);
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
