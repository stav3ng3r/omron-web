<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="DistributionCenter",
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
 *          property="telefono",
 *          description="telefono",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="direccion_web",
 *          description="direccion_web",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="marca",
 *          description="marca",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class DistributionCenter extends Model
{
    use SoftDeletes;

    public $table = 'om_centros_distribucion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'descripcion',
        'pais',
        'ciudad',
        'telefono',
        'direccion_web',
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
        'telefono' => 'string',
        'direccion_web' => 'string',
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
    public function cnPai()
    {
        return $this->belongsTo(\App\Models\CnPai::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function omOficinasRegionales()
    {
        return $this->hasMany(\App\Models\OmOficinasRegionale::class);
    }
}
