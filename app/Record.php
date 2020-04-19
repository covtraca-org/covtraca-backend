<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public $fillable = [
        'cid', 'lat', 'long'
    ];
}
