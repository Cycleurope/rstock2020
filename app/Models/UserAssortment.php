<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAssortment extends Model
{
    protected $table = "userassortments";

    protected $fillable = ['ocascd', 'user_id', 'octdat'];

}
