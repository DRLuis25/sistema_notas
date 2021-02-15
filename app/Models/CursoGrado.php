<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CursoGrado
 * @package App\Models
 * @version February 3, 2021, 5:29 pm UTC
 *
 * @property \App\Models\Curso $curso
 * @property \App\Models\Grado $grado
 * @property \App\Models\Periodo $periodo
 * @property integer $periodo_id
 * @property integer $curso_id
 * @property integer $grado_id
 */
class CursoGrado extends Model
{
    use SoftDeletes;

    public $table = 'curso_grado';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'periodo_id',
        'curso_id',
        'grado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'periodo_id' => 'integer',
        'curso_id' => 'integer',
        'grado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'periodo_id' => 'required',
        'curso_id' => 'required',
        'grado_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function grado()
    {
        return $this->belongsTo(Grados::class, 'grado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodo()
    {
        return $this->belongsTo(Periodos::class, 'periodo_id');
    }
}
