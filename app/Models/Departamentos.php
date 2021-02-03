<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departamentos
 * @package App\Models
 * @version February 3, 2021, 7:21 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $docentes
 * @property string $nombre
 */
class Departamentos extends Model
{
    use SoftDeletes;

    public $table = 'departamento';
    
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
        'created_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function docentes()
    {
        return $this->hasMany(\App\Models\Docente::class, 'departamento_id');
    }
}
