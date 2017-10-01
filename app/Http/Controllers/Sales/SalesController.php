<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Mail;
use App\Seller;
use App\Worker;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($message = null)
    {
        return $message;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers = DB::table('sellers')
                    ->join('users', 'sellers.idUser', '=', 'users.idUser')
                    ->join('workers', 'workers.idWorker', '=', 'users.owner')
                    ->select('sellers.idSeller', 'workers.name', 'workers.lastname', 'sellers.level')
                    ->get();
        $data = ['sellers' => $sellers];
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

        $worker->save();

        //create User to send email

        $user = new User;

        $user->email = $worker->email;
        $user->password = str_random(60);
        $user->confirm_token = str_random(100);
        $user->owner = $worker->id;

        $user->save();

        $data['name'] = $worker->name;
        $data['email'] = $user->email;
        $data['confirm_token'] = $user->confirm_token;

        Mail::send('emails.create', ['data' => $data], function ($mail) use($data) {
                   
            $mail->to($data['email'], $data['name']);
                
            $mail->subject('Confirmar Cuenta');
        });

        //creating seller
        $seller = new Seller;
        
        $seller->idUser = $user->id;
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
