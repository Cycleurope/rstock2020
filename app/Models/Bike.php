<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $table = 'bikes';

    protected $fillable = ['mmitno', 'mmitds', 'mmitcl', 'mmitgr', 'mbaval', 'mtstat', 'mbstqt', 'mmspe1', 'mmspe2', 'mmspe3'];
}
