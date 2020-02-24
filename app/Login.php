<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Login extends Model
{

    protected $table = "logins";

    protected $fillable = ['logged_at', 'user_id'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
