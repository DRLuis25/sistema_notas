<?php

namespace App\Repositories;

use App\Models\Niveles;
use App\Repositories\BaseRepository;

/**
 * Class NivelesRepository
 * @package App\Repositories
 * @version February 3, 2021, 7:33 am UTC
*/

class NivelesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion'
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
        return Niveles::class;
    }
}
