<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserAssortment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'address1', 'address2', 'postalcode', 'city', 'phone', 'email', 'resp', 'role', 'password', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function assortments()
    {
        return $this->hasMany(UserAssortment::class);
    }

    public function activebadge()
    {
        if($this->active == 1)
        {
            $badge = '<span class="badge flatbadge flatbadge-green">Actif</span>';
        } else {
            $badge = '<span class="badge flatbadge flatbadge-bloody">Inactif</span>';
        }

        return $badge;
    }


}
