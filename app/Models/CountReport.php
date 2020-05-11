<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CountReport
 * @package App\Models
 * @version May 9, 2020, 6:45 pm UTC
 *
 * @property string $country_code
 * @property integer $count
 * @property string $country_name
 */
class CountReport extends Model
{
    use SoftDeletes;

    public $table = 'count_reports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'country_code',
        'count',
        'country_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_code' => 'string',
        'count' => 'integer',
        'country_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_code' => 'required'
    ];

    
}
