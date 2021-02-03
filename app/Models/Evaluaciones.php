<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Evaluaciones
 * @package App\Models
 * @version February 3, 2021, 6:29 pm UTC
 *
 * @property \App\Models\Bimestre $bimestre
 * @property \App\Models\Capacidad $capacidad
 * @property \App\Models\Periodo $periodo
 * @property integer $matricula_id
 * @property integer $periodo_id
 * @property integer $bimestre_id
 * @property integer $capacidad_id
 * @property integer $calificacion
 * @property string $observaciones
 */
class Evaluaciones extends Model
{
    use SoftDeletes;

    public $table = 'evaluacion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'matricula_id',
        'periodo_id',
        'bimestre_id',
        'capacidad_id',
        'calificacion',
        'observaciones'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'matricula_id' => 'integer',
        'periodo_id' => 'integer',
        'bimestre_id' => 'integer',
        'capacidad_id' => 'integer',
        'calificacion' => 'integer',
        'observaciones' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matricula_id' => 'required',
        'periodo_id' => 'required',
        'bimestre_id' => 'required',
        'capacidad_id' => 'required',
        'calificacion' => 'required|integer',
        'observaciones' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bimestre()
    {
        return $this->belongsTo(\App\Models\Bimestre::class, 'bimestre_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function capacidad()
    {
        return $this->belongsTo(\App\Models\Capacidad::class, 'capacidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodo()
    {
        return $this->belongsTo(\App\Models\Periodo::class, 'periodo_id');
    }
}
