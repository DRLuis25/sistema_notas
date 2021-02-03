<?php

namespace App\Repositories;

use App\Models\Periodos;
use App\Repositories\BaseRepository;

/**
 * Class PeriodosRepository
 * @package App\Repositories
 * @version February 3, 2021, 8:03 am UTC
*/

class PeriodosRepository extends BaseRepository
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
        return Periodos::class;
    }
}
