<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Rules\MatchEmailAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['send']]);
    }

    public function index()
    {
        return view('users.me.password.index');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        
        return redirect()->route('dashboard')
            ->with('message', 'Votre mot de passe a été modifié avec succès')
            ->with('class', 'success');
    }

    public function reset()
    {
        return view('users.me.password.reset');
    }

    public function sendNewEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', new MatchEmailAddress]
        ]);

        $data = [
            'name' => 'John Doe',
            'body' => 'body body'
        ];

        Mail::send('mail.send-new-password', $data, function($mail) {
            $mail->from('web@cycleurope.fr');
            $mail->to('vincent.lombard@cycleurope.fr');
            $mail->subject('New Password');
        });

        return redirect()->route('dashboard')
            ->with('message', 'Un nouveau mot de passe a étét envoyé à l\'adresse e-mail que vous avez renseigné.')
            ->with('class', 'success');
    }

    public function send()
    {
        return view('password.send');
    }
}
