<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Alumnos
 * @package App\Models
 * @version February 3, 2021, 1:39 pm UTC
 *
 * @property string $dni
 * @property string $nombres
 * @property string $otrosNombres
 * @property string $apellidoPaterno
 * @property string $apellidoMaterno
 * @property string $email
 */
class Alumnos extends Model
{
    use SoftDeletes;

    public $table = 'alumno';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'dni',
        'nombres',
        'otrosNombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dni' => 'string',
        'nombres' => 'string',
        'otrosNombres' => 'string',
        'apellidoPaterno' => 'string',
        'apellidoMaterno' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dni' => 'required|string|max:8',
        'nombres' => 'required|string|max:255',
        'otrosNombres' => 'required|string|max:255',
        'apellidoPaterno' => 'required|string|max:255',
        'apellidoMaterno' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
