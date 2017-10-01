<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;

class PrincipalController extends Controller
{
    /**
    * Get the role(s) allowed for the user
    */
    public function getRole()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $roles = DB::table('user_roles')
                        ->join('users', 'user_roles.idUser', '=', 'users.idUser')
                        ->join('roles', 'roles.idRole', '=', 'user_roles.idRole')
                        ->where('user_roles.idUser', '=', $user->idUser)
                        ->select('roles.*')
                        ->orderBy('idRole', 'desc')
                        ->get();
            return view('principal', ['roles' => $roles]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::check();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
