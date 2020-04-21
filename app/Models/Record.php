<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Record
 * @package App\Models
 * @version April 21, 2020, 1:11 am UTC
 *
 * @property integer uid
 * @property number long
 * @property number lat
 * @property boolean symptoms
 * @property boolean tested
 * @property boolean test_positive
 */
class Record extends Model
{
    use SoftDeletes;

    public $table = 'records';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'uid',
        'long',
        'lat',
        'symptoms',
        'tested',
        'test_positive',
        'data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uid' => 'integer',
        'long' => 'float',
        'lat' => 'float',
        'symptoms' => 'boolean',
        'tested' => 'boolean',
        'test_positive' => 'boolean',
        'data' => 'json'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uid' => 'required'        
    ];

    
}
