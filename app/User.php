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
        'name', 'username', 'address1', 'address2', 'postalcode', 'city', 'phone', 'email', 'resp', 'role', 'password', 'active', 'm3pin', 'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'last_login_at'
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
            $badge = '<span class="badge badge-success">ACTIF</span>';
        } else {
            $badge = '<span class="badge badge-purple">INACTIF</span>';
        }

        return $badge;
    }

    public function hasM3Pin()
    {
        $m3pinbadge = "";
        if($this->m3pin == 1) {
            $m3pinbadge = '<span class="badge badge-success">Oui</span>';
        } else {
            $m3pinbadge = '<span class="badge badge-info">PIN Perso</span>';
        }

        return $m3pinbadge;
    }

    public function friendlyRole()
    {
        switch($this->role):
            case 'admin':
                $role_badge = '<span class="badge badge-purple">Administrateur</span>';
            break;
            case 'sales':
                $role_badge = '<span class="badge badge-pink">Commercial</span>';
            break;
            case 'dealer':
                $role_badge = '<span class="badge badge-info">Client</span>';
            break;
            default:
                $role_badge = '<span class="badge badge-light">Indéfini</span>';
        endswitch;

        return $role_badge;
    }


}
