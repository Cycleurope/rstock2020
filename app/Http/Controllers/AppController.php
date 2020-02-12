<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AppController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard() {
        $dealers = User::where('role', 'dealer')->paginate(20);        
        return view('dashboard', [
            'dealers' => $dealers
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
