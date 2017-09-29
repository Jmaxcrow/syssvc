@extends('principal')

@section('title')
 :: Viendo Cliente ::
@stop

@section('content')
<style>
	.container {
		background: rgba(32, 32, 76, 1);
	}
	h2, label {
		color: white;
	}
</style>
<div class="container">
		<h2 class="col-md-12">Viendo de Cliente</h2>
		<div class="col-md-12">
			<div class="form-group col-md-2">
				<label for="celular">Telef. Celular</label>
				<input type="text" name="celular" class="form-control" readonly="true" value="{{$client->phone_number}}">
			</div>
			<div class="form-group col-md-2">
				<label for="casa">Telef. Casa</label>
				<input type="text" name="casa" class="form-control" readonly="true" value="{{$client->house_phone_number}}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-5">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" maxlength="50" class="form-control" readonly="true" value="{{$client->name}}">
			</div>
			<div class="form-group col-md-7">
				<label for="apellido">Apellidos</label>
				<input type="text" name="apellido" maxlength="75" class="form-control" readonly="true" value="{{$client->lastname}}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-4">
				<label for="fecha_nacimiento">Fecha Nacimiento</label>
				<?php $birthday = date_create($client->birthday); ?>
				<input type="date" name="fecha_nacimiento" class="form-control" readonly="true" value="{{ date_format($birthday,'Y-m-d')}}">
			</div>
			<div class="form-group col-md-3">
				<label for="genero">Genero</label>
				<input type="text" value="{{$client->sex}}" class="form-control" readonly="true">
			</div>
			<div class="form-group col-md-2">
				<label for="esCliente">Cliente</label>
				<input type="text" value="{{$client->isClient}}" class="form-control" readonly="true">
			</div>
			<div class="form-group col-md-2">
				<label for="trabaja">Trabaja</label>
				<input type="text" value="{{$client->hasWorks}}" class="form-control" readonly="true">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-7">
				<label for="direccion">Direccion - Calle</label>
				<input type="text" name="direccion" class="form-control" readonly="true" value="{{$client->address}}">
			</div>
			<div class="form-group  col-md-3">
				<label for="nro_apt">Apt #</label>
				<input type="text" name="nro_apt" class="form-control" readonly="true" value="{{$client->number_apt}}">
			</div>
			<div class="form-group  col-md-4">
				<label for="ciudad">Ciudad</label>
				<input type="text" name="ciudad" class="form-control" readonly="true" value="{{$client->city}}">
			</div>
			<div class="form-group col-md-4">
				<label for="estado">Estado</label>
				<input type="text" name="estado" class="form-control" readonly="true" value="{{$client->state}}">
			</div>
			<div class="form-group col-md-4">
				<label for="zip_code">ZIP CODE</label>
				<input type="text" name="zip_code" class="form-control" readonly="true" value="{{$client->zip_code}}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-4">
				<label for="nroCuenta">Nro de Cuenta</label>
				<input type="text" name="nroCuenta" class="form-control" readonly="true" value="{{$client->count_number}}">
			</div>
			<div class="form-group col-md-4">
				<label for="zone">Zona</label>
				<input type="text" value="{{$client->zone}}" class="form-control" readonly="true">
			</div>
			<div class="form-group col-md-12">
				<label for="comentarios">Comentarios</label>
				<textarea name="comentarios" class="form-control" readonly="true" id="" rows="2">{{ $client->commentaries }}</textarea>
			</div>
		</div>
		<div class="col-md-9">
			<div class="form-group col-md-3">
				<label for="origen_cliente">Origen del Cliente</label>
				<input type="text" class="form-control" readonly="true" value="{{ $client->origin }}">
			</div>
			<div class="form-group col-md-3">
				<label for="sub_origen">Sub Categoria</label>
				<input type="text" class="form-control" readonly="true" value="{{ $client->sub_origin }}">
			</div>
			<div class="form-group col-md-3">
				<label for="fecha_origen">Fecha Origen</label>
				<?php $date_origin = date_create($client->date_origin); ?>
				<input type="date" name="fecha_origen" class="form-control" readonly="true" value="{{ date_format($date_origin, 'Y-m-d') }}">
			</div>
			<div class="form-group col-md-3">
				<label for="hora_origen">Hora Origen</label>
				<input type="text" name="hora_origen" class="form-control" readonly="true" value="{{ $client->time_origin }}" >
			</div>
		</div>
		<div class="col-md-6">
			<a href="{{ url('clients/history') }}" class="btn btn-info">Ver Historial</a> 
		</div>
		<div class="col-md-6">
			<button id="closeWindow" type="button" class="btn btn-primary">Aceptar</button>
		</div>
</div>
@stop

@section('script')
	<script>
		$(document).ready(function () {
			$('#closeWindow').click(function(){
				window.close();
			});
		});
	</script>
@stop