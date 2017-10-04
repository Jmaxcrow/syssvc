<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;

use Role;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function changeRole($role_set)
    {
        $getRole = Role::where('name', '=', $role_set)->first();
        $roles = Session::get('roles');
        $roles_aux = array();
        foreach ($roles as $rol) {
            if (strcasecmp($rol->name, $role_set) == 0) {
                array_push($roles_aux, $getRole);
            }
        }
        foreach ($roles as $rol) {
            if (strcasecmp($rol->name, $role_set) != 0) {
                array_push($roles_aux, $rol);
            }
        }
        Session::put('roles', $roles_aux);
        return redirect('/principal');
    }

}
