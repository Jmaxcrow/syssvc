<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use Redirect;
use Session;
use Mail;
use Crypt;
use App\Seller;
use App\Worker;
use App\Telemarketer;
use App\User;
use App\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalesController extends Controller
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
            if (strcasecmp($role->name, 'vendedor') == 0 ) {
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
    public function index($message = null)
    {
        $this->hasTelemarketing();
        $roles = Session::get('roles');
        $sellers = DB::table('sellers')
                    ->join('users', 'sellers.idUser', '=', 'users.idUser')
                    ->join('workers', 'workers.idWorker', '=', 'users.owner')
                    ->select('sellers.idSeller', 'workers.*')
                    ->get();
        $data = ['sellers' => $sellers, 'roles' => $roles, 'message' => $message];
        return view('sales/listSellers', $data);
    }

    public function hasTelemarketing()
    {
        $user = Auth::user();
        $telemarketingChoosed = $telemarketer = DB::table('sellers')
                                                ->where('sellers.idUser', '=', $user->idUser)
                                                ->join('users', 'sellers.idUser', '=', 'users.idUser')
                                                ->join('workers', 'workers.idWorker', '=', 'users.owner')
                                                ->select('sellers.idTelemarketer')
                                                ->first();
        if ( $telemarketingChoosed->idTelemarketer == null) {
            Redirect::to('/sales/chooseTelemarketing/list')->send();
            exit;
        }
    }

    public function showTelemarketersAvaliables()
    {
        $telemarketers = DB::table('telemarketing')
                    ->join('users', 'telemarketing.idUser', '=', 'users.idUser')
                    ->join('workers', 'workers.idWorker', '=', 'users.owner')
                    ->select('telemarketing.idTelemarketer', 'workers.*')
                    ->get();
        $data = ['telemarketers' => $telemarketers];
        return view('sales/chooseTelemarketing', $data);
    }

    public function chooseTelemarketing($id)
    {
        $user = Auth::user();
        if ($id == 0) { // si id = 0, crear nuevo telemarketing, sino asignar a vendedor
            $telemarketer = new telemarketer;
            $telemarketer->idUser = $user->idUser;
            $telemarketer->save();

            $role = Role::where('name', '=', 'telemarketing')->first();
            DB::insert('insert into user_roles (idUser, idRole) values (?, ?)', [$user->idUser, $role->idRole]);

            $seller = DB::table('sellers')->where('idUser', '=', $user->idUser)->first();
            $changeSeller = Seller::find($seller->idSeller);
            $changeSeller->idTelemarketer = $telemarketer->idTelemarketer;
            $changeSeller->save();

        }
        else {
            $seller = DB::table('sellers')->where('idUser', '=', $user->idUser)->first();
            $changeSeller = Seller::find($seller->idSeller);
            $changeSeller->idTelemarketer = $id;
            $changeSeller->save();
        }
        
        return redirect('/sales');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Session::get('roles');
        $sellers = DB::table('sellers')
                    ->join('users', 'sellers.idUser', '=', 'users.idUser')
                    ->join('workers', 'workers.idWorker', '=', 'users.owner')
                    ->select('sellers.idSeller', 'workers.name', 'workers.lastname', 'sellers.level')
                    ->get();
        $data = ['sellers' => $sellers, 'roles' => $roles];
        return view('sales/registerSeller', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //craete Worker first
        $worker = new Worker;

        $worker->name = $request->name;
        $worker->lastname = $request->lastname;
        $worker->email = $request->email;
        $worker->address = $request->direccion;
        $worker->number_apt = $request->nro_apt;
        $worker->city = $request->ciudad;
        $worker->state = $request->estado;
        $worker->zip_code = $request->zip_code;
        $worker->date_init = $request->fechaInicio;
        $worker->payxcomission = $request->pagoxcomisiones;
        $worker->save();

        //create User to send email

        $user = new User;

        $user->email = $worker->email;
        $user->password = str_random(60);
        $user->confirm_token = str_random(100);
        $user->owner = $worker->idWorker;

        $user->save();

        //obteniendo rol para asigancion

        $role = Role::where('name', '=', 'vendedor')->first();


        DB::insert('insert into user_roles (idUser, idRole) values (?, ?)', [$user->idUser, $role->idRole]);

        $data['name'] = $worker->name;
        $data['email'] = $user->email;
        $data['confirm_token'] = $user->confirm_token;

        Mail::send('emails.create', ['data' => $data], function ($mail) use($data) {
                   
            $mail->to($data['email'], $data['name']);
            $mail->cc('barrantes.dev96@gmail.com');
            $mail->subject('Confirmar Cuenta');
        });

        //creating seller
        $seller = new Seller;
        
        $seller->idUser = $user->idUser;
        $seller->level = $request->level;
        $seller->inserted_by = $request->inserted_by;
        if ($seller->save()) {
             $message = "El vendedor  $seller->name $seller->lastname ha sido registrado Exitosamente. Se le envio un email de confirmacion de cuenta ";
         }
         else {
            $message = "El vendedor  $seller->name $seller->lastname no ha sido registrado Exitosamente ";
         }


        return $this->index($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Session::get('roles');
        $seller = DB::table('sellers')
                    ->where('sellers.idSeller', '=', $id)
                    ->join('users', 'sellers.idUser', '=', 'users.idUser')
                    ->join('workers', 'workers.idWorker', '=', 'users.owner')
                    ->select('sellers.idSeller', 'sellers.level', 'workers.*')
                    ->first();
        $data = ['seller' => $seller, 'roles' => $roles];
        return view('sales/seeSeller', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Session::get('roles');
        $seller = DB::table('sellers')
                    ->where('sellers.idSeller', '=', $id)
                    ->join('users', 'sellers.idUser', '=', 'users.idUser')
                    ->join('workers', 'workers.idWorker', '=', 'users.owner')
                    ->select('sellers.idSeller', 'sellers.level', 'workers.*')
                    ->first();
        $data = ['seller' => $seller, 'roles' => $roles, 'worker' => Crypt::encrypt($seller->idWorker)];
        return view('sales/editSeller', $data);
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
        //craete Worker first
        $idWorker = Crypt::decrypt($request->worker);
        $worker = Worker::find($idWorker);

        $worker->name = $request->name;
        $worker->lastname = $request->lastname;
        $worker->address = $request->direccion;
        $worker->number_apt = $request->nro_apt;
        $worker->city = $request->ciudad;
        $worker->state = $request->estado;
        $worker->zip_code = $request->zip_code;
        $worker->date_init = $request->fechaInicio;
        $worker->payxcomission = $request->pagoxcomisiones;
        $worker->save();

        //creating seller
        $seller = Seller::find($id);

        $seller->level = $request->level;

        if ($seller->save()) {
             $message = "El vendedor  $seller->name $seller->lastname ha sido actualizado Exitosamente ";
         }
         else {
            $message = "El vendedor  $seller->name $seller->lastname no ha sido actualizado Exitosamente ";
         }

        return $this->index($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
