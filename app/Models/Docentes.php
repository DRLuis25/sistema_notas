<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Docentes
 * @package App\Models
 * @version February 3, 2021, 7:55 am UTC
 *
 * @property \App\Models\Departamento $departamento
 * @property string $dni
 * @property string $name
 * @property string $direccion
 * @property string $apellidoPaterno
 * @property string $apellidoMaterno
 * @property string $email
 * @property string $estadoCivil
 * @property string $telefono
 * @property string $seguroSocial
 * @property integer $departamento_id
 */
class Docentes extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'dni',
        'name',
        'direccion',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
        'estadoCivil',
        'telefono',
        'seguroSocial',
        'departamento_id',
        'password',
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
        'direccion' => 'string',
        'apellidoPaterno' => 'string',
        'apellidoMaterno' => 'string',
        'email' => 'string',
        'estadoCivil' => 'string',
        'telefono' => 'string',
        'seguroSocial' => 'string',
        'departamento_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dni' => 'required|string|max:8',
        'nombres' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'apellidoPaterno' => 'required|string|max:255',
        'apellidoMaterno' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'estadoCivil' => 'required|string|max:255',
        'telefono' => 'nullable|string|max:255',
        'seguroSocial' => 'required|string|max:11|min:11',
        'departamento_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function departamento()
    {
        return $this->belongsTo(Departamentos::class, 'departamento_id');
    }
}
