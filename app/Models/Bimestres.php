<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bimestres
 * @package App\Models
 * @version February 3, 2021, 6:38 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $evaluacions
 * @property string $nombre
 */
class Bimestres extends Model
{
    use SoftDeletes;

    public $table = 'bimestre';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function evaluacions()
    {
        return $this->hasMany(\App\Models\Evaluacion::class, 'bimestre_id');
    }
}
