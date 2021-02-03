<?php

namespace App\Repositories;

use App\Models\Evaluaciones;
use App\Repositories\BaseRepository;

/**
 * Class EvaluacionesRepository
 * @package App\Repositories
 * @version February 3, 2021, 6:29 pm UTC
*/

class EvaluacionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matricula_id',
        'periodo_id',
        'bimestre_id',
        'capacidad_id',
        'calificacion',
        'observaciones'
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
        return Evaluaciones::class;
    }
}
