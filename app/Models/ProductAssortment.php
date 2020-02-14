<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductAssortment extends Model
{

    protected $table = "product_assortments";

    protected $fillable = ['oiascd', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
