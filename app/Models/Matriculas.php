<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Matriculas
 * @package App\Models
 * @version February 3, 2021, 6:22 pm UTC
 *
 * @property \App\Models\Matricula $matricula
 * @property \App\Models\Periodo $periodo
 * @property \App\Models\Seccion $seccion
 * @property integer $matricula_id
 * @property integer $periodo_id
 * @property integer $seccion_id
 * @property string $observaciones
 * @property string $exonerado
 */
class Matriculas extends Model
{
    use SoftDeletes;

    public $table = 'matricula_detalle';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'matricula_id',
        'periodo_id',
        'seccion_id',
        'observaciones',
        'exonerado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'matricula_id' => 'integer',
        'periodo_id' => 'integer',
        'seccion_id' => 'integer',
        'observaciones' => 'string',
        'exonerado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matricula_id' => 'required',
        'periodo_id' => 'required',
        'seccion_id' => 'required',
        'observaciones' => 'nullable|string|max:255',
        'exonerado' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function matriculamaestro()
    {
        return $this->belongsTo(MatriculaMaestro::class, 'matricula_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodo()
    {
        return $this->belongsTo(Periodos::class, 'periodo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function seccion()
    {
        return $this->belongsTo(Secciones::class, 'seccion_id');
    }
}
