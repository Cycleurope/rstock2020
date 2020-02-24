<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login as UserLogin;

class UserLoginController extends Controller
{
    public function index()
    {
        $logins = UserLogin::orderBy('id', 'DESC')->get();
        return view('logins.index', [
            'logins' => $logins
        ]);
    }
}
