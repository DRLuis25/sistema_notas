<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Secciones
 * @package App\Models
 * @version February 3, 2021, 5:44 pm UTC
 *
 * @property \App\Models\Grado $grado
 * @property \App\Models\Periodo $periodo
 * @property \Illuminate\Database\Eloquent\Collection $matriculaDetalles
 * @property \Illuminate\Database\Eloquent\Collection $seccionDocenteCursos
 * @property integer $periodo_id
 * @property string $letra
 * @property integer $nrovacantes
 * @property integer $grado_id
 */
class Secciones extends Model
{
    use SoftDeletes;

    public $table = 'seccion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'periodo_id',
        'letra',
        'nrovacantes',
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
        'letra' => 'string',
        'nrovacantes' => 'integer',
        'grado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'periodo_id' => 'required',
        'letra' => 'required|string|max:1',
        'nrovacantes' => 'required|integer',
        'grado_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function matriculaDetalles()
    {
        return $this->hasMany(\App\Models\MatriculaDetalle::class, 'seccion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function seccionDocenteCursos()
    {
        return $this->hasMany(\App\Models\SeccionDocenteCurso::class, 'seccion_id');
    }
}
