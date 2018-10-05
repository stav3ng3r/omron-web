<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Client",
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
 *          property="numero_documento",
 *          description="numero_documento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="logo",
 *          description="logo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="distribuidor",
 *          description="distribuidor",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Client extends Model
{
    use SoftDeletes;

    public $table = 'cn_clientes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion',
        'numero_documento',
        'direccion',
        'email',
        'logo',
        'distribuidor',
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
        'numero_documento' => 'string',
        'direccion' => 'string',
        'email' => 'string',
        'logo' => 'string',
        'distribuidor' => 'integer'
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
    public function omDistribuidore()
    {
        return $this->belongsTo(\App\Models\OmDistribuidore::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cnClienteContactos()
    {
        return $this->hasMany(\App\Models\CnClienteContacto::class);
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
    public function omPosDetalles()
    {
        return $this->hasMany(\App\Models\OmPosDetalle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cnClientesDireccionEntregas()
    {
        return $this->hasMany(\App\Models\CnClientesDireccionEntrega::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function vtPresupuestosCabeceras()
    {
        return $this->hasMany(\App\Models\VtPresupuestosCabecera::class);
    }
}
