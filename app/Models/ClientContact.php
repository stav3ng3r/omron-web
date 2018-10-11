<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="ClientContact",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_cliente",
 *          description="id_cliente",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="departamento",
 *          description="departamento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefono_contacto",
 *          description="telefono_contacto",
 *          type="string"
 *      )
 * )
 */
class ClientContact extends Model
{
    public $table = 'cn_cliente_contacto';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';


    public $fillable = [
        'id_cliente',
        'nombre',
        'departamento',
        'email',
        'telefono_contacto',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'id_cliente'        => 'integer',
        'nombre'            => 'string',
        'departamento'      => 'string',
        'email'             => 'string',
        'telefono_contacto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_cliente'        => 'required|integer',
        'nombre'            => 'required|string',
        'departamento'      => 'required|string',
        'email'             => 'required|string',
        'telefono_contacto' => 'required|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_cliente');
    }
}
