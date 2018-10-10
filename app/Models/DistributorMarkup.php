<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="DistributorMarkup",
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
 *          property="porcentaje_envio",
 *          description="porcentaje_envio",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="porcentaje_aduana",
 *          description="porcentaje_aduana",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="porcentaje_utilidad",
 *          description="porcentaje_utilidad",
 *          type="number",
 *          format="float"
 *      )
 * )
 */
class DistributorMarkup extends Model
{
    public $table = 'om_markup_distribuidores';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'distribuidor',
        'porcentaje_envio',
        'porcentaje_aduana',
        'porcentaje_utilidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                  => 'integer',
        'distribuidor'        => 'integer',
        'porcentaje_envio'    => 'float',
        'porcentaje_aduana'   => 'float',
        'porcentaje_utilidad' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'distribuidor'        => 'required|integer',
        'porcentaje_envio'    => 'required|numeric',
        'porcentaje_aduana'   => 'required|numeric',
        'porcentaje_utilidad' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'distribuidor');
    }
}
