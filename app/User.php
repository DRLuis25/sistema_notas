<?php

namespace App;

use App\Models\Departamentos;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
        'name' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'apellidoPaterno' => 'required|string|max:255',
        'apellidoMaterno' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'estadoCivil' => 'required|string|max:255',
        'telefono' => 'nullable|string|max:255',
        'seguroSocial' => 'required|string|max:11|min:11',
        'password' => 'required|min:8|string',
        'departamento_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
    public static $updateRules = [
        'dni' => 'required|string|max:8',
        'name' => 'required|string|max:255',
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
