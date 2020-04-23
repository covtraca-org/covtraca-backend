<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Device
 * @package App\Models
 * @version April 23, 2020, 12:13 am UTC
 *
 * @property string uid
 * @property string name
 */
class Device extends Model
{
    use SoftDeletes;

    public $table = 'devices';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'uid',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uid' => 'string',
        'name' => 'string'
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
