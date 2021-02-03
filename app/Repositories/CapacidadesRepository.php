<?php

namespace App\Repositories;

use App\Models\Capacidades;
use App\Repositories\BaseRepository;

/**
 * Class CapacidadesRepository
 * @package App\Repositories
 * @version February 3, 2021, 6:15 pm UTC
*/

class CapacidadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'periodo_id',
        'curso_id',
        'grado_id',
        'asignatura',
        'abreviatura',
        'orden'
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
        return Capacidades::class;
    }
}
