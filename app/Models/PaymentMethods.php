<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="PaymentMethods",
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
 *          property="dias",
 *          description="dias",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class PaymentMethods extends Model
{
    public $table = 'cn_formas_pago';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';


    public $fillable = [
        'descripcion',
        'dias',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'descripcion' => 'string',
        'dias'        => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required|string',
        'dias'        => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cmComprasCabeceras()
    {
        return $this->hasMany(\App\Models\CmComprasCabecera::class);
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
    public function vtPresupuestosCabeceras()
    {
        return $this->hasMany(\App\Models\VtPresupuestosCabecera::class);
    }
}
