<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Grados
 * @package App\Models
 * @version February 3, 2021, 5:33 pm UTC
 *
 * @property \App\Models\Nivel $nivel
 * @property \Illuminate\Database\Eloquent\Collection $capacidads
 * @property \Illuminate\Database\Eloquent\Collection $cursoCapacidads
 * @property \Illuminate\Database\Eloquent\Collection $cursoGrados
 * @property \Illuminate\Database\Eloquent\Collection $seccions
 * @property \Illuminate\Database\Eloquent\Collection $seccionDocenteCursos
 * @property string $descripcion
 * @property integer $nivel_id
 */
class Grados extends Model
{
    use SoftDeletes;

    public $table = 'grado';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'descripcion',
        'nivel_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'nivel_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required|string|max:255',
        'nivel_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function nivel()
    {
        return $this->belongsTo(Niveles::class, 'nivel_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function capacidads()
    {
        return $this->hasMany(\App\Models\Capacidad::class, 'grado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cursoCapacidads()
    {
        return $this->hasMany(\App\Models\CursoCapacidad::class, 'grado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cursoGrados()
    {
        return $this->hasMany(\App\Models\CursoGrado::class, 'grado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function secciones()
    {
        return $this->hasMany(Secciones::class, 'grado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function seccionDocenteCursos()
    {
        return $this->hasMany(\App\Models\SeccionDocenteCurso::class, 'grado_id');
    }
}
