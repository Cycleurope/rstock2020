<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    public function overhauls()
    {
        return $this->hasMany(Overhaul::class);
    }
}
