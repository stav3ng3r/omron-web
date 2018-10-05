<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use SoftDeletes;

    public $table = 'cn_clientes_direccion_entrega';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


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
        'id' => 'integer',
        'descripcion' => 'string',
        'pais' => 'integer',
        'ciudad' => 'integer',
        'direccion_entrega' => 'string',
        'telefono_entrega' => 'string',
        'contacto_entrega' => 'string',
        'cliente' => 'integer'
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
    public function cnCliente()
    {
        return $this->belongsTo(\App\Models\CnCliente::class);
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
    public function vtPresupuestosCabeceras()
    {
        return $this->hasMany(\App\Models\VtPresupuestosCabecera::class);
    }
}
