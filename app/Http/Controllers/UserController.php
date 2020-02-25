<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
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
        $users = User::where('role', 'dealer')->orderBy('username', 'ASC')->get();   
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

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'active' => 1
        ]);

        return redirect()->route('users.sales')
            ->with('message', 'Le compte a bien été crée.')
            ->with('class', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)->first();
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
        $message = "Le compte a été mis à jour.";
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->password != '') {
            $message = "Le compte a été mis à jour et un nouveau mot de passe a été renseigné.";
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('users.sales')
            ->with('class', 'info')
            ->with('message', $message);
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

    public function activate(Request $request, $id)
    {
        $request->validate([
            'password' => ['required'],
            'confirm_password' => ['same:password'],
        ]);

        User::find($id)->update(['password' => Hash::make($request->password), 'active' => 1]);
        
        return redirect()->route('users.index')
            ->with('message', 'Le compte a bien été activé.')
            ->with('class', 'success');
    }

    public function desactivate($id)
    {
        User::find($id)->update(['active' => 0, 'password' => null]);
        return redirect()->route('users.index')
            ->with('message', 'Le compte a bien été desactivé.')
            ->with('class', 'danger');
    }

    public function outdatedAssortments()
    {
        $users = User::whereHas('assortments', function($q) {
            $q->where('octdat', '<=', date('Ymd'));
        })->get();

        return view('users.outdated', [
            'users' => $users
        ]);  
    }

    public function lastLogins()
    {
        $users = User::where('last_login_at', '!=', null)->orderBy('last_login_at', 'DESC')->limit(30)->get();
        return view('users.last-logins', [
            'users' => $users
        ]);
    }

    public function sales()
    {
        $sales = User::where('role', 'sales')->orderBy('id', 'desc')->get();
        return view('users.sales.index', [
            'sales' => $sales
        ]);
    }

    public function createSales()
    {
        return view('users.sales.create');
    }

    public function editSales($id)
    {
        $user = User::find($id);
        return view('users.sales.edit', [
            'user' => $user
        ]);
    }

    public function admins()
    {   
        $admins = User::where('role', 'admin')->orderBy('id', 'desc')->get();
        return view('users.admin.index', [
            'admins' => $admins
        ]);
    }

    public function createAdmin()
    {
        return view('users/admin.create');
    }

}
