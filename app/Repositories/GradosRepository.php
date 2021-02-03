<?php

namespace App\Repositories;

use App\Models\Grados;
use App\Repositories\BaseRepository;

/**
 * Class GradosRepository
 * @package App\Repositories
 * @version February 3, 2021, 5:33 pm UTC
*/

class GradosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
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
        return Grados::class;
    }
}
