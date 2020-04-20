<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'cid', 'lat', 'long',
        'symptoms', 'tested', 'tested_positive',
        'data'
    ];

    protected $cast = [
        'data' => 'json'
    ];
}
