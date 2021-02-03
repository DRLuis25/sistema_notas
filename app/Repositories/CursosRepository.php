<?php

namespace App\Repositories;

use App\Models\Cursos;
use App\Repositories\BaseRepository;

/**
 * Class CursosRepository
 * @package App\Repositories
 * @version February 3, 2021, 1:24 pm UTC
*/

class CursosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nivel_id'
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
        return Cursos::class;
    }
}
