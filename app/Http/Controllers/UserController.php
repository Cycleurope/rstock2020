<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    public static $rolesArray = ['admin', 'bank', 'guest', 'monitor', 'dealer'];

    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        app('debugbar')->disable();
        $users = User::where('role', 'dealer')->get();   
        return view('users.index', [
            'users' => $users
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
    }

    public function createWithRole($role)
    {
        return view('users.create-with-role', [
            'role' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (in_array($request->role, static::$rolesArray)) {

            if($request->role == 'dealer') {
                $user = User::create([
                    'username'      => $request->username,
                    'email'         => $request->email,
                    'name'          => '',
                    'password'      => bcrypt($request->password),
                    'role'          => $request->role,
                    'name'          => $request->name,
                    'address1'      => $request->address,
                    'postalcode'    => $request->postalcode,
                    'city'          => $request->city,
                    'phone'         => $request->phone
                ]);
            } else {
                $user = User::create([
                    'username'          => $request->username,
                    'email'             => $request->email,
                    'name'              => '',
                    'password'          => bcrypt($request->password),
                    'role'              => $request->role
                ]);
            }

            switch($request->role):
                case 'admin':
                    return redirect()->route('users.admins')->with('success', 'Le compte administrateur a été crée avec succes.');
                break;
                case 'bank':
                    return redirect()->route('users.monitors')->with('success', 'Le compte moniteur a été crée avec succes.');;
                break;
                case 'guest':
                    return redirect()->route('users.guests')->with('success', 'Le compte visiteur a été crée avec succes.');;
                break;
                case 'dealer':
                    return redirect()->route('users.guests')->with('success', 'Le compte Expert Mobilité a été crée avec succes.');;
                break;
                default:
                    return redirect()->route('users.index')->with('success', 'Le compte a été crée avec succes.');;
            endswitch;

        } else {

            switch($request->role):
                case 'admin':
                    return redirect()->route('users.admins')->with('error', 'Il y a des erreurs dans le formulaire.');;
                break;
                case 'bank':
                    return redirect()->route('users.monitors')->with('error', 'Il y a des erreurs dans le formulaire.');;;
                break;
                case 'guest':
                    return redirect()->route('users.guests')->with('error', 'Il y a des erreurs dans le formulaire.');;;
                break;
                case 'dealer':
                    return redirect()->route('users.guests')->with('error', 'Il y a des erreurs dans le formulaire.');;;
                break;
                default:
                    return redirect()->route('users.index')->with('error', 'Il y a des erreurs dans le formulaire.');;;
            endswitch;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        dd($user);
        $user = User::where('username', $user)->first();
        return view('users.show', [
            'dealer' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');

        $user = User::find($id);
        $user->delete();
        switch($user->role):
            case 'admin':
                return redirect()->route('users.admins')->with('success', 'Le compte administrateur a été supprimé.');
            break;
            case 'bank':
                return redirect()->route('users.monitors')->with('success', 'Le compte moniteur a été supprimé.');;
            break;
            case 'guest':
                return redirect()->route('users.guests')->with('success', 'Le compte visiteur a été supprimé.');;
            break;
            default:
                return redirect()->route('users.index')->with('success', 'Le compte a été supprimé.');;
        endswitch;
    }

    public function admins()
    {
        $users = User::where('role', 'admin')->get();
        return view('admins.index', [
            'users' => $users
        ]);
    }

}
