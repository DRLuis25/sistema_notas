<?php

namespace App\Repositories;

use App\Models\Matriculas;
use App\Repositories\BaseRepository;

/**
 * Class MatriculasRepository
 * @package App\Repositories
 * @version February 3, 2021, 6:22 pm UTC
*/

class MatriculasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matricula_id',
        'periodo_id',
        'seccion_id',
        'observaciones',
        'exonerado'
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
        return Matriculas::class;
    }
}
