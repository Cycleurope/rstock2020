<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFamily extends Model
{

    protected $table = "product_family";

    protected $fillable = ['mmitgr', 'name'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }


}
