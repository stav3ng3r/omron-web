<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CnUser",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_persona",
 *          description="id_persona",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_role",
 *          description="id_role",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_tipo_usuario",
 *          description="id_tipo_usuario",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="usuario",
 *          description="usuario",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bloqueado",
 *          description="bloqueado",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="resetear_password",
 *          description="resetear_password",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      )
 * )
 */
class CnUser extends Model
{
    use SoftDeletes;

    public $table = 'cn_usuarios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_persona',
        'id_role',
        'id_tipo_usuario',
        'password',
        'usuario',
        'bloqueado',
        'resetear_password',
        'fecha_ultimo_login',
        'fecha_creacion',
        'fecha_actualizacion',
        'fecha_borrado',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_persona' => 'integer',
        'id_role' => 'integer',
        'id_tipo_usuario' => 'integer',
        'password' => 'string',
        'usuario' => 'string',
        'bloqueado' => 'boolean',
        'resetear_password' => 'boolean',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cnPersona()
    {
        return $this->belongsTo(\App\Models\CnPersona::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cnRole()
    {
        return $this->belongsTo(\App\Models\CnRole::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cnTipoUsuario()
    {
        return $this->belongsTo(\App\Models\CnTipoUsuario::class);
    }
}
