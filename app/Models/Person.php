<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Person",
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
 *          property="apellido",
 *          description="apellido",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numero_documento",
 *          description="numero_documento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefono_contacto",
 *          description="telefono_contacto",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      )
 * )
 */
class Person extends Model
{
    public $table = 'cn_personas';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';

    protected $dates = [
        'fecha_ingreso'
    ];

    public $fillable = [
        'nombre',
        'apellido',
        'numero_documento',
        'telefono_contacto',
        'email',
        'fecha_ingreso',
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
        'nombre'            => 'string',
        'apellido'          => 'string',
        'numero_documento'  => 'string',
        'telefono_contacto' => 'string',
        'email'             => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre'            => 'required|string',
        'apellido'          => 'required|string',
        'numero_documento'  => 'required|string',
        'telefono_contacto' => 'required|string',
        'email'             => 'email'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cn_users()
    {
        return $this->hasMany(CnUser::class, 'id_persona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function salesmen()
    {
        return $this->hasMany(Salesman::class, 'id_vendedor');
    }

    public function getFullNameAttribute()
    {
        return trim($this->attributes['nombre'] . ' ' . $this->attributes['apellido']);
    }
}
