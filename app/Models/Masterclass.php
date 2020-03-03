<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masterclass extends Model
{
    protected $table = "masterclasses";

    protected $fillable = [
        'title',
        'summary',
        'program',
        'price',
        'location',
        'information',
        'max_attendees',
        'status',
    ];

}
