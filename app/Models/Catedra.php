<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Catedra
 * @package App\Models
 * @version February 3, 2021, 6:32 pm UTC
 *
 * @property \App\Models\Curso $curso
 * @property \App\Models\Docente $docente
 * @property \App\Models\Grado $grado
 * @property \App\Models\Periodo $periodo
 * @property \App\Models\Seccion $seccion
 * @property integer $periodo_id
 * @property integer $docente_id
 * @property integer $curso_id
 * @property integer $grado_id
 * @property integer $seccion_id
 * @property string|\Carbon\Carbon $nrohoras
 */
class Catedra extends Model
{
    use SoftDeletes;

    public $table = 'catedra_docente';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'periodo_id',
        'docente_id',
        'curso_id',
        'grado_id',
        'seccion_id',
        'nrohoras'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'periodo_id' => 'integer',
        'docente_id' => 'integer',
        'curso_id' => 'integer',
        'grado_id' => 'integer',
        'seccion_id' => 'integer',
        'nrohoras' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'periodo_id' => 'required',
        'docente_id' => 'required',
        'curso_id' => 'required',
        'grado_id' => 'required',
        'seccion_id' => 'required',
        'nrohoras' => 'required',
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
    public function docente()
    {
        return $this->belongsTo(Docentes::class, 'docente_id');
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function seccion()
    {
        return $this->belongsTo(Secciones::class, 'seccion_id');
    }
}
