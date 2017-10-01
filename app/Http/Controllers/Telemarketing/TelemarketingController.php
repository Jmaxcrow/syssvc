<?php

namespace App\Http\Controllers\Telemarketing;

use Illuminate\Http\Request;

use Redirect;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TelemarketingController extends Controller
{
    public function __construct($foo = null)
    {
       $this->middleware('auth');
       $roles = Session::get('roles');
        $allowed = false;
        foreach ($roles as $role) {
            if (strcasecmp($role->name, 'administrador') == 0 ) {
                $allowed = true;
            }
        }
        if (!($allowed)) {
            Session::flush();
            Session::flash('message', 'Acceso Denegado. No tiene Permisos Para Acceder al Modulo de Telemarketing!!!. Accion Registrada');
            Redirect::to('/auth/logout')->send();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "hola";
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
