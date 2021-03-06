<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Question
 * @package App\Models
 * @version April 21, 2020, 12:32 am UTC
 *
 * @property string title
 * @property string i18n
 * @property string type
 * @property json options
 */
class Question extends Model
{
    use SoftDeletes, HasRoles;    

    public $table = 'questions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',        
        'state_name',
        'i18n',
        'type',
        'options'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'state_name' => 'string',
        'i18n' => 'string',        
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'type' => 'required'
    ];

    
}
