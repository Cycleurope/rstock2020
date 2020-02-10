<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('isDealer', function($user) {
            return $user->role == 'dealer';
        });

        Gate::define('isBank', function($user) {
            return $user->role == 'bank';
        });

        Gate::define('isGuest', function($user) {
            return $user->role == 'guest';
        });
        
    }
}
