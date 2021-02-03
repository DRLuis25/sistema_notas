<?php

namespace App\Repositories;

use App\Models\Secciones;
use App\Repositories\BaseRepository;

/**
 * Class SeccionesRepository
 * @package App\Repositories
 * @version February 3, 2021, 5:44 pm UTC
*/

class SeccionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'periodo_id',
        'letra',
        'nrovacantes',
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
        return Secciones::class;
    }
}
