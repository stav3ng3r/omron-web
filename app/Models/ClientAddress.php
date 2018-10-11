<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="ClientAddress",
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
 *          property="direccion_entrega",
 *          description="direccion_entrega",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefono_entrega",
 *          description="telefono_entrega",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contacto_entrega",
 *          description="contacto_entrega",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cliente",
 *          description="cliente",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class ClientAddress extends Model
{

    public $table = 'cn_clientes_direccion_entrega';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';


    public $fillable = [
        'descripcion',
        'pais',
        'ciudad',
        'direccion_entrega',
        'telefono_entrega',
        'contacto_entrega',
        'cliente'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'descripcion'       => 'string',
        'pais'              => 'integer',
        'ciudad'            => 'integer',
        'direccion_entrega' => 'string',
        'telefono_entrega'  => 'string',
        'contacto_entrega'  => 'string',
        'cliente'           => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion'       => 'required|string',
        'pais'              => 'required|integer',
        'ciudad'            => 'required|integer',
        'direccion_entrega' => 'required|string',
        'telefono_entrega'  => 'required|string',
        'contacto_entrega'  => 'required|string',
        'cliente'           => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function city()
    {
        return $this->belongsTo(City::class, 'ciudad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class, 'cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(Country::class, 'pais');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function vtPresupuestosCabeceras()
    {
        return $this->hasMany(\App\Models\VtPresupuestosCabecera::class);
    }
}
