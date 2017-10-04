<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Session;
use App\Http\Requests;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;

class PrincipalController extends Controller
{
    public function __construct($foo = null)
    {
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (Session::has('roles')) {
                $roles = Session::get('roles');
            }
            else {
                $user = Auth::user();
                $roles = DB::table('user_roles')
                            ->join('users', 'user_roles.idUser', '=', 'users.idUser')
                            ->join('roles', 'roles.idRole', '=', 'user_roles.idRole')
                            ->where('user_roles.idUser', '=', $user->idUser)
                            ->select('roles.*')
                            ->orderBy('idRole', 'desc')
                            ->get();
                Session::put('roles', $roles);
            }
            foreach ($roles as $role) {
                if (strcasecmp($role->name, 'administrador') == 0 ) {
                    return view('principal', ['roles' => $roles]);
                }
                if (strcasecmp($role->name, 'vendedor') == 0 ) {
                    return redirect('sales');
                }
                if (strcasecmp($role->name, 'telemarketing') == 0 ) {
                    return redirect('telemarketingfa/choosesellertowork');
                }
            }
        }
        return redirect('auth/login');
    }


    public function getOut()
    {
        Session::flush();
        Session::put('message', 'Has salido Correctamente de la aplicacion');
        return redirect('auth/logout');
    }

}
