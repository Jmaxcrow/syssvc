<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;

use App\Client;
use App\Origin;
use App\Zone;
use App\SubOrigin;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ClientController extends Controller
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
    public function index($message = null)
    {
        $clients = Client::all();
        $data = ['clients' => $clients, 'message' => $message];
        return view('clients/listClients', $data);
    }
    /**
    * Display the history fof a client
    */
    public function showHistory($id = null)
    {
        $message = 'Estamos trabajando en esta funcion. Disponible en proxima actualizacion';
        $data = ['message' => $message];
        return view('support/message', $data);
    }

    public function referent()
    {
        $message = 'Estamos trabajando en esta funcion. Disponible en proxima actualizacion';
        $data = ['message' => $message];
        return view('support/message', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all();
        $origins = Origin::all();
        $sub_origins = SubOrigin::all();
        $data = ['zones' => $zones, 'origins'=> $origins, 'sub_origins' => $sub_origins];
        return view('Clients/registerClient', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
        * Firs will see if exits new zone, origin, suborigin, after create client
        */
        $idZone = '';
        $idOrigin = '';
        $idSubOrigin = '';
        if ($request->zone == 'other') {
            $zone = new Zone;
            $zone->name = $request->nuevaZona;
            $zone->created_by = 1;
            $zone->save();
            $idZone = $zone->id;
        }
        else {
            $idZone = $request->zone;
        }

        if ($request->origen_cliente == 'other') {
            $origin = new Origin;
            $origin->name = $request->nuevoOrigen;
            $origin->created_by = 1;
            $origin->save();
            $idOrigin = $origin->id;
        }
        else {
            $idOrigin = $request->origen_cliente;
        }

        if ($request->sub_origen == 'other') {
            $suborigin = new SubOrigin;
            $suborigin->name = $request->nuevoSubOrigen;
            $suborigin->ref_origin = $origin->id;
            $suborigin->created_by = 1;
            $suborigin->save();
            $idSubOrigin = $suborigin->id;
        }
        else {
            $idSubOrigin = $request->sub_origen;
        }

        $client = new Client;

        $client->phone_number = $request->celular;
        $client->house_phone_number = $request->casa;
        $client->name = $request->nombre;
        $client->lastname = $request->apellido;
        $client->address = $request->direccion;
        $client->number_apt = $request->nro_apt;
        $client->city = $request->ciudad;
        $client->state = $request->estado;
        $client->zip_code = $request->zip_code;
        $client->birthday = $request->fecha_nacimiento;
        $client->sex = $request->genero;
        $client->isClient = $request->esCliente;
        $client->hasWorks = $request->trabaja;
        $client->count_number = $request->nroCuenta;
        $client->date_origin = $request->fecha_origen;
        $client->time_origin = $request->hora_origen;
        $client->commentaries = $request->comentarios;
        $client->origin = $idOrigin;
        $client->sub_origin = $idSubOrigin;
        $client->zone = $idZone;
        $client->created_by = 1;
        if ($client->save()) {
             $message = "El cliente  $client->name $client->lastname ha sido registrado Exitosamente ";
         }
         else {
            $message = "El cliente  $client->name $client->lastname no ha sido registrado Exitosamente ";
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
        $client = Client::find($id);
        $data = ['client' => $client];
        return view('clients/seeClient', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zones = Zone::all();
        $origins = Origin::all();
        $sub_origins = SubOrigin::all();
        $client = Client::find($id)->first();
        $data = ['client' => $client, 'zones' => $zones, 'sub_origins'=> $sub_origins, 'origins' => $origins ];
        return view('clients/editClient', $data);
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
        /**
        * Firs will see if exits new zone, origin, suborigin, after create client
        */
        $idZone = '';
        $idOrigin = '';
        $idSubOrigin = '';
        if ($request->zone == 'other') {
            $zone = new Zone;
            $zone->name = $request->nuevaZona;
            $zone->created_by = 1;
            $zone->save();
            $idZone = $zone->id;
        }
        else {
            $idZone = $request->zone;
        }
        if ($request->origen_cliente == 'other') {
            $origin = new Origin;
            $origin->name = $request->nuevoOrigen;
            $origin->created_by = 1;
            $origin->save();
            $idOrigin = $origin->id;
        }
        else {
            $idOrigin = $request->origen_cliente;
        }

        if ($request->sub_origen == 'other') {
            $suborigin = new SubOrigin;
            $suborigin->name = $request->nuevoSubOrigen;
            $suborigin->ref_origin = $origin->id;
            $suborigin->created_by = 1;
            $suborigin->save();
            $idSubOrigin = $suborigin->id;
        }
        else {
            $idSubOrigin = $request->sub_origen;
        }

        $client = Client::find($id);

        $client->phone_number = $request->celular;
        $client->house_phone_number = $request->casa;
        $client->name = $request->nombre;
        $client->lastname = $request->apellido;
        $client->address = $request->direccion;
        $client->number_apt = $request->nro_apt;
        $client->city = $request->ciudad;
        $client->state = $request->estado;
        $client->zip_code = $request->zip_code;
        $client->birthday = $request->fecha_nacimiento;
        $client->sex = $request->genero;
        $client->isClient = $request->esCliente;
        $client->hasWorks = $request->trabaja;
        $client->count_number = $request->nroCuenta;
        $client->date_origin = $request->fecha_origen;
        $client->time_origin = $request->hora_origen;
        $client->commentaries = $request->comentarios;
        $client->origin = $idOrigin;
        $client->sub_origin = $idSubOrigin;
        $client->zone = $idZone;
        $client->created_by = 1;
        if ($client->save()) {
             $message = "El cliente  $client->name $client->lastname ha sido actualizado Exitosamente ";
         }
         else {
            $message = "El cliente  $client->name $client->lastname no ha sido actualizado Exitosamente ";
         }
        return $this->index($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->clientDelete;
        $client = Client::where('idClient', '=', $id);
        $message = "El cliente  $client->name $client->lastname ha sido enviado al archivo muerto ";
        $client->delete();
        return $this->index($message);
    }
}
