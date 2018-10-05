<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use SoftDeletes;

    public $table = 'cn_personas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


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
        'id' => 'integer',
        'nombre' => 'string',
        'apellido' => 'string',
        'numero_documento' => 'string',
        'telefono_contacto' => 'string',
        'email' => 'string'
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
    public function cnUsuarios()
    {
        return $this->hasMany(\App\Models\CnUsuario::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cnVendedores()
    {
        return $this->hasMany(\App\Models\CnVendedore::class);
    }
}
