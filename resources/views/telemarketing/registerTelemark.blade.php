@extends('principal')

@section('title')
 :: Registrar Telemarketing ::
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
	{!! Form::open(['route'=>'telemarketing.store', 'method'=>'POST']) !!}
		{!! csrf_field() !!}
		<h2 class="col-md-12">Registro de Telemarketing</h2>
		<div class="col-md-6">
			<div class="form-group col-md-5">
				<label for="name">Nombre</label>
				<input type="text" name="name" maxlength="50" class="form-control" tabindex="4">
			</div>
			<div class="form-group col-md-7">
				<label for="lastname">Apellidos</label>
				<input type="text" name="lastname" maxlength="75" class="form-control" tabindex="5">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-5">
				<label for="email">Email</label>
				<input type="text" name="email" class="form-control">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-7">
				<label for="direccion">Direccion - Calle</label>
				<input type="text" name="direccion" class="form-control">
			</div>
			<div class="form-group col-md-2">
				<label for="">Verificar</label>
				<button class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> </button>
			</div>
			<div class="form-group  col-md-3">
				<label for="nro_apt">Apt #</label>
				<input type="text" name="nro_apt" class="form-control">
			</div>
			<div class="form-group  col-md-4">
				<label for="ciudad">Ciudad</label>
				<input type="text" name="ciudad" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="estado">Estado</label>
				<input type="text" name="estado" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="zip_code">ZIP CODE</label>
				<input type="text" name="zip_code" class="form-control">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-4">
				<label for="fechaInicio">Fecha de Inicio</label>
				<input type="date" name="fechaInicio" class="form-control">
			</div>
			<div class="form-group col-md-12">
				<label for="pagoxcomisiones">Acuerdo de Pago por Comisiones</label>
				<textarea name="pagoxcomisiones" id="" rows="2" class="form-control"></textarea>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-lg btn-primary">Registrar</button>
			</div>
		</div>
	{!! Form::close() !!}
</div>

@stop
