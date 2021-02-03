<?php

namespace App\Repositories;

use App\Models\Catedra;
use App\Repositories\BaseRepository;

/**
 * Class CatedraRepository
 * @package App\Repositories
 * @version February 3, 2021, 6:32 pm UTC
*/

class CatedraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'periodo_id',
        'docente_id',
        'curso_id',
        'grado_id',
        'seccion_id',
        'nrohoras'
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
        return Catedra::class;
    }
}
