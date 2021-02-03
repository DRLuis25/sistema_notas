<?php

namespace App\Repositories;

use App\Models\Bimestres;
use App\Repositories\BaseRepository;

/**
 * Class BimestresRepository
 * @package App\Repositories
 * @version February 3, 2021, 6:38 pm UTC
*/

class BimestresRepository extends BaseRepository
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
        return Bimestres::class;
    }
}
