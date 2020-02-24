<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login as UserLogin;
use DB;

class UserLoginController extends Controller
{
    public function index()
    {
        $logins = UserLogin::orderBy('id', 'DESC')->get();
        return view('logins.index', [
            'logins' => $logins
        ]);
    }

    public function mostActiveUsers()
    {
        $logins = UserLogin::groupBy('user_id')
            ->selectRaw('count(*) as total, user_id')
            ->get();

        return view('logins.most-active', [
            'logins' => $logins
        ]);
    }

}
