<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chunk extends Model
{
    protected $table = "chunks";

    protected $fillable = ["name"];
}
