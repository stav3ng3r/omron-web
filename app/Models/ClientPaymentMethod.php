<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ClientPaymentMethod",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="distribuidor",
 *          description="distribuidor",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cliente",
 *          description="cliente",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="forma_de_pago",
 *          description="forma_de_pago",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class ClientPaymentMethod extends Model
{
    use SoftDeletes;

    public $table = 'cn_clientes_forma_pago';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'distribuidor',
        'cliente',
        'forma_de_pago'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'distribuidor' => 'integer',
        'cliente' => 'integer',
        'forma_de_pago' => 'integer'
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
    public function cnCliente()
    {
        return $this->belongsTo(\App\Models\CnCliente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function omDistribuidore()
    {
        return $this->belongsTo(\App\Models\OmDistribuidore::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cnFormasPago()
    {
        return $this->belongsTo(\App\Models\CnFormasPago::class);
    }
}
