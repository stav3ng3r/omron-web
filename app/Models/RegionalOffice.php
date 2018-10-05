<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="RegionalOffice",
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
 *          property="telefono",
 *          description="telefono",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="centro_distribucion",
 *          description="centro_distribucion",
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
class RegionalOffice extends Model
{
    use SoftDeletes;

    public $table = 'om_oficinas_regionales';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'descripcion',
        'pais',
        'ciudad',
        'direccion',
        'telefono',
        'centro_distribucion',
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
        'telefono' => 'string',
        'centro_distribucion' => 'integer',
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
    public function omCentrosDistribucion()
    {
        return $this->belongsTo(\App\Models\OmCentrosDistribucion::class);
    }

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
    public function cnPai()
    {
        return $this->belongsTo(\App\Models\CnPai::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function omDistribuidores()
    {
        return $this->hasMany(\App\Models\OmDistribuidore::class);
    }
}
