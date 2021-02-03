<?php

namespace App\Repositories;

use App\Models\Alumnos;
use App\Repositories\BaseRepository;

/**
 * Class AlumnosRepository
 * @package App\Repositories
 * @version February 3, 2021, 1:39 pm UTC
*/

class AlumnosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dni',
        'nombres',
        'otrosNombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'email'
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
        return Alumnos::class;
    }
}
