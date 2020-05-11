<?php

namespace App\Repositories;

use App\Models\CountReport;
use App\Repositories\BaseRepository;

/**
 * Class CountReportRepository
 * @package App\Repositories
 * @version May 9, 2020, 6:45 pm UTC
*/

class CountReportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_code',
        'count',
        'country_name'
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
        return CountReport::class;
    }
}
