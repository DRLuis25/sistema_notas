<?php

namespace App\Repositories;

use App\Models\CursoGrado;
use App\Repositories\BaseRepository;

/**
 * Class CursoGradoRepository
 * @package App\Repositories
 * @version February 3, 2021, 5:29 pm UTC
*/

class CursoGradoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'periodo_id',
        'curso_id',
        'grado_id'
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
        return CursoGrado::class;
    }
}
