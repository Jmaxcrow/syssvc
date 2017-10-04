@extends('principal')

@section('title')
 :: Editar Telemarketing ::
@stop

@section('content')

<style>
	.container {
		background: rgba(32, 32, 76, 1);
	}
	form h2, form label {
		color: white;
	}
</style>

<div class="container">
	{!! Form::open(['route'=> ['telemarketing.update', 'id' => $telemarketer->idTelemarketer], 'method'=>'PUT']) !!}
		{!! csrf_field() !!}
		<h2 class="col-md-12">Editar Telemarketing</h2>
		<input type="hidden" name="worker" value="{{ $worker }}">
		<div class="col-md-6">
			<div class="form-group col-md-5">
				<label for="name">Nombre</label>
				<input type="text" name="name" maxlength="50" class="form-control" value="{{ $telemarketer->name }}">
			</div>
			<div class="form-group col-md-7">
				<label for="lastname">Apellidos</label>
				<input type="text" name="lastname" maxlength="75" class="form-control" value="{{ $telemarketer->lastname }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-5">
				<label for="email">Email</label>
				<input type="text" name="email" class="form-control" readonly="true" value="{{ $telemarketer->email }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-7">
				<label for="direccion">Direccion - Calle</label>
				<input type="text" name="direccion" class="form-control" value="{{ $telemarketer->address }}">
			</div>
			<div class="form-group  col-md-3">
				<label for="nro_apt">Apt #</label>
				<input type="text" name="nro_apt" class="form-control" value="{{ $telemarketer->number_apt }}" >
			</div>
			<div class="form-group  col-md-4">
				<label for="ciudad">Ciudad</label>
				<input type="text" name="ciudad" class="form-control" value="{{ $telemarketer->city }}">
			</div>
			<div class="form-group col-md-4">
				<label for="estado">Estado</label>
				<input type="text" name="estado" class="form-control" value="{{ $telemarketer->state }}">
			</div>
			<div class="form-group col-md-4">
				<label for="zip_code">ZIP CODE</label>
				<input type="text" name="zip_code" class="form-control" value="{{ $telemarketer->zip_code }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-4">
				<label for="fechaInicio">Fecha de Inicio</label>
				<input type="date" name="fechaInicio" class="form-control" value="{{ $telemarketer->date_init }}">
			</div>
			<div class="form-group col-md-12">
				<label for="pagoxcomisiones">Acuerdo de Pago por Comisiones</label>
				<textarea name="pagoxcomisiones" id="" rows="2" class="form-control">{{ $telemarketer->payxcomission }}</textarea>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-lg btn-warning">Actualizar</button>
			</div>
		</div>
	{!! Form::close() !!}
</div>

@stop
