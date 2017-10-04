<?php

namespace App\Http\Controllers\Telemarketing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TelemarketingFunctionsController extends Controller
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
            if (strcasecmp($role->name, 'telemarketing') == 0 ) {
                $allowed = true;
            }
        }
        if (!($allowed)) {
            Session::flush();
            Session::put('message', 'Acceso Denegado. No tiene Permisos Para Acceder al Modulo de Telemarketing!!!. Accion Registrada');
            return redirect('auth/logout');
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Session::get('roles');
        $data = ['roles' => $roles];
        return view('principal', $data);
    }

    /**
    * Display a list of sellers to choose with who starts work
    */

    public function chooseSellerToWork()
    {
        
        $user = Auth::user();
        $sellers = DB::table('sellers')
                    ->join('telemarketing', 'sellers.idTelemarketer', '=', 'telemarketing.idTelemarketer')
                    ->join('users', 'sellers.idUser', '=', 'users.idUser')
                    ->join('workers', 'users.owner', '=', 'workers.idWorker')
                    ->where('telemarketing.idUser', '=', $user->idUser)
                    ->select('sellers.idSeller', 'workers.name', 'workers.lastname')
                    ->groupBy()
                    ->get();
        $data = ['sellers' => $sellers];
        return view('telemarketing/chooseSellerToWork', $data);

    }

    /**
    * Choose seller and go index
    */

    public function choosedSeller($id)
    {
        Session::put('choosedSeller', $id);
        return $this->index();
    }

    public function leaveSeller()
    {
        Session::remove('choosedSeller');
        return redirect('telemarketingfa/choosesellertowork');
    }

}
