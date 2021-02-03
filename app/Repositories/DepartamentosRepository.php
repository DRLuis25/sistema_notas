<?php

namespace App\Repositories;

use App\Models\Departamentos;
use App\Repositories\BaseRepository;

/**
 * Class DepartamentosRepository
 * @package App\Repositories
 * @version February 3, 2021, 7:21 am UTC
*/

class DepartamentosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return Departamentos::class;
    }
}
