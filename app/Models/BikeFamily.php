<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BikeFamily extends Model
{

    protected $table = "bike_family";

    protected $fillable = ['mmitgr', 'name'];


    public function bikes()
    {
        return $this->hasMany(Bike::class);
    }


}
