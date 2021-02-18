<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Exonerados
 * @package App\Models
 * @version February 19, 2021, 4:40 am UTC
 *
 * @property \App\Models\Matricula $matricula
 * @property \App\Models\Periodo $periodo
 * @property \App\Models\Curso $curso
 * @property integer $matricula_id
 * @property integer $periodo_id
 * @property integer $curso_id
 */
class Exonerados extends Model
{
    use SoftDeletes;

    public $table = 'exonerado';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'matricula_id',
        'periodo_id',
        'curso_id'
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
        'curso_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matricula_id' => 'required',
        'periodo_id' => 'required',
        'curso_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function matricula()
    {
        return $this->belongsTo(\App\Models\Matricula::class, 'matricula_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodo()
    {
        return $this->belongsTo(\App\Models\Periodo::class, 'periodo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class, 'curso_id');
    }
}
