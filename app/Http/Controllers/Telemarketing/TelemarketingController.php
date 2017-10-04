<?php

namespace App\Http\Controllers\Telemarketing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use Redirect;
use Mail;
use Session;
use Crypt;
use App\User;
use App\Worker;
use App\Role;
use App\Telemarketer;
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
        $roles = Session::get('roles');
        $telemarketers = DB::table('telemarketing')
                    ->join('users', 'telemarketing.idUser', '=', 'users.idUser')
                    ->join('workers', 'workers.idWorker', '=', 'users.owner')
                    ->select('telemarketing.idTelemarketer', 'workers.*')
                    ->get();
        $data = ['telemarketers' => $telemarketers, 'roles' => $roles, 'message' => $message];
        return view('telemarketing/listTelemarketing', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Session::get('roles');
        $data = ['roles' => $roles];
        return view('telemarketing/registerTelemark', $data);
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

        $role = Role::where('name', '=', 'telemarketing')->first();


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
        $telemarketer = new Telemarketer;
        
        $telemarketer->idUser = $user->idUser;

        if ($telemarketer->save()) {
             $message = "El telemarketer  $telemarketer->name $telemarketer->lastname ha sido registrado Exitosamente. Se le envio un email de confirmacion de cuenta ";
         }
         else {
            $message = "El telemarketer  $telemarketer->name $telemarketer->lastname no ha sido registrado Exitosamente ";
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
        $telemarketer = DB::table('telemarketing')
                    ->where('telemarketing.idTelemarketer', '=', $id)
                    ->join('users', 'telemarketing.idUser', '=', 'users.idUser')
                    ->join('workers', 'workers.idWorker', '=', 'users.owner')
                    ->select('telemarketing.idTelemarketer', 'workers.*')
                    ->first();
        $data = ['telemarketer' => $telemarketer, 'roles' => $roles];
        return view('telemarketing/seeTelemarketing', $data);
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
        $telemarketer = DB::table('telemarketing')
                    ->where('telemarketing.idTelemarketer', '=', $id)
                    ->join('users', 'telemarketing.idUser', '=', 'users.idUser')
                    ->join('workers', 'workers.idWorker', '=', 'users.owner')
                    ->select('telemarketing.idTelemarketer', 'workers.*')
                    ->first();
        $data = ['telemarketer' => $telemarketer, 'roles' => $roles, 'worker' => Crypt::encrypt($telemarketer->idWorker)];
        return view('telemarketing/editTelemarketing', $data);
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

        if ($worker->save()) {
             $message = "El vendedor  $worker->name $worker->lastname ha sido actualizado Exitosamente ";
         }
         else {
            $message = "El vendedor  $worker->name $worker->lastname no ha sido actualizado Exitosamente ";
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
        //
    }
}
