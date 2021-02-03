<?php

namespace App\Repositories;

use App\Models\Docentes;
use App\Repositories\BaseRepository;

/**
 * Class DocentesRepository
 * @package App\Repositories
 * @version February 3, 2021, 7:55 am UTC
*/

class DocentesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dni',
        'nombres',
        'direccion',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
        'estadoCivil',
        'telefono',
        'seguroSocial',
        'departamento_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Docentes::class;
    }
}
