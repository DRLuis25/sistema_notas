<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MatriculaMaestro
 * @package App\Models
 * @version February 3, 2021, 7:14 pm UTC
 *
 * @property \App\Models\Alumno $alumno
 * @property \Illuminate\Database\Eloquent\Collection $matriculaDetalles
 * @property string $nromatricula
 * @property integer $alumno_id
 */
class MatriculaMaestro extends Model
{
    use SoftDeletes;

    public $table = 'matricula';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nromatricula',
        'alumno_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nromatricula' => 'string',
        'alumno_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nromatricula' => 'required|string|max:10',
        'alumno_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function alumno()
    {
        return $this->belongsTo(\App\Models\Alumno::class, 'alumno_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function matriculaDetalles()
    {
        return $this->hasMany(\App\Models\MatriculaDetalle::class, 'matricula_id');
    }
}
