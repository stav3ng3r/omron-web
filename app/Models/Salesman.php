<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Salesman",
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
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="porcentaje_comision",
 *          description="porcentaje_comision",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="meta",
 *          description="meta",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      )
 * )
 */
class Salesman extends Model
{
    use SoftDeletes;

    public $table = 'cn_vendedores';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';
    const DELETED_AT = 'fecha_borrado';


    public $fillable = [
        'id_persona',
        'activo',
        'porcentaje_comision',
        'fecha_creacion',
        'meta',
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
        'id'         => 'integer',
        'id_persona' => 'integer',
        'activo'     => 'boolean',
        'meta'       => 'integer',
        'email'      => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_persona' => 'required|integer',
        'activo'     => 'nullable|boolean',
        'meta'       => 'required|numeric',
        'email'      => 'required|email'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'id_persona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function vtPresupuestosCabeceras()
    {
        return $this->hasMany(\App\Models\VtPresupuestosCabecera::class);
    }
}
