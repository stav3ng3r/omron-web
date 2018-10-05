<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Country",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="abreviatura",
 *          description="abreviatura",
 *          type="string"
 *      )
 * )
 */
class Country extends Model
{
    use SoftDeletes;

    public $table = 'cn_pais';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion',
        'abreviatura',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'abreviatura' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cnCiudades()
    {
        return $this->hasMany(\App\Models\CnCiudade::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function omCentrosDistribucions()
    {
        return $this->hasMany(\App\Models\OmCentrosDistribucion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function omOficinasRegionales()
    {
        return $this->hasMany(\App\Models\OmOficinasRegionale::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function omDistribuidores()
    {
        return $this->hasMany(\App\Models\OmDistribuidore::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cnClientesDireccionEntregas()
    {
        return $this->hasMany(\App\Models\CnClientesDireccionEntrega::class);
    }
}
