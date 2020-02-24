<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{

    protected $table = "logins";

    protected $fillable = ['logged_at', 'user_id'];

    public $timestamps = false;

}
