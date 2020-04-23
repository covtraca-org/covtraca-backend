<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Report
 * @package App\Models
 * @version April 23, 2020, 12:26 am UTC
 *
 * @property json answer
 * @property integer question_id
 * @property integer device_id
 * @property number lat
 * @property number long 
 */
class Report extends Model
{
    use SoftDeletes;

    public $table = 'reports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'answer',        
        'device_id',
        'lat',
        'long'        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',        
        'device_id' => 'integer',
        'lat' => 'double',
        'long' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'answer' => 'required'
    ];

    
}
