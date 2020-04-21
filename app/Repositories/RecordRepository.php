<?php

namespace App\Repositories;

use App\Models\Record;
use App\Repositories\BaseRepository;

/**
 * Class RecordRepository
 * @package App\Repositories
 * @version April 21, 2020, 1:11 am UTC
*/

class RecordRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uid',
        'long',
        'lat',
        'symptoms',
        'tested',
        'test_positive'
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
        return Record::class;
    }
}
