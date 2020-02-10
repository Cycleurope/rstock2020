<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AppController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard() {
        $now = date('U');
        return view('dashboard', [

        ]);
    }

    public function profile()
    {
        return view('profile');
    }

    public function search()
    {
        return view('search');
    }

}
