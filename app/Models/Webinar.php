<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $fillable = [
        'title',
        'date',
        'time_start',
        'time_end',
        'description',
        'link',
    ];

    protected $casts = [
        'date' => 'date',
        'time_start' => 'datetime:H:i',
    ];
}
