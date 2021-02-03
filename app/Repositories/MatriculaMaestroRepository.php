<?php

namespace App\Repositories;

use App\Models\MatriculaMaestro;
use App\Repositories\BaseRepository;

/**
 * Class MatriculaMaestroRepository
 * @package App\Repositories
 * @version February 3, 2021, 7:14 pm UTC
*/

class MatriculaMaestroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nromatricula',
        'alumno_id'
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
        return MatriculaMaestro::class;
    }
}
