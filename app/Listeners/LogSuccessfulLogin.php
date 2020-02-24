<?php

namespace App\Listeners;

use App\Login as UserLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Http\Request;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;

        if($user->role != "admin") {

            $user->last_login_at = date('Y-m-d H:i:s');
            $user->save();

            $login = UserLogin::create([
                'user_id' => $user->id,
                'logged_at' => date('Y-m-d H:i:s')
            ]);
            
        }

    }
}
