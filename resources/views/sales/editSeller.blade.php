@extends('principal')

@section('title')
 :: Editar Vendedor ::
@stop

@section('content')

<?php $levels = ['Master', 'Spin Out', 'Director', 'Royal', 'Blue', 'Nivel 1', 'Nivel 2', 'Nivel 3', 'Joint Venture', 'New Comer']  ?>

<style>
	.container {
		background: rgba(32, 32, 76, 1);
	}
	form h2, form label {
		color: white;
	}
</style>

<div class="container">
	{!! Form::open(['route'=> ['sales.update', 'id' => $seller->idSeller], 'method'=>'PUT']) !!}
		{!! csrf_field() !!}
		<h2 class="col-md-12">Editar Vendedor</h2>
		<input type="hidden" name="worker" value="{{ $worker }}">
		<div class="col-md-6">
			<div class="form-group col-md-5">
				<label for="name">Nombre</label>
				<input type="text" name="name" maxlength="50" class="form-control" value="{{ $seller->name }}">
			</div>
			<div class="form-group col-md-7">
				<label for="lastname">Apellidos</label>
				<input type="text" name="lastname" maxlength="75" class="form-control" value="{{ $seller->lastname }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-5">
				<label for="email">Email</label>
				<input type="text" name="email" class="form-control" readonly="true" value="{{ $seller->email }}">
			</div>
			<div class="form-group col-md-6">
				<label for="level">Nivel de Jerarquia</label>
				<select name="level" id="" class="form-control">
					@foreach( $levels as $level )
						@if( strcasecmp($level, $seller->level) == 0)
							<option value="{{ $level }}">{{ $level }}</option>
							<?php continue; ?>
						@endif
							<option value="{{ $level }}">{{ $level }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-7">
				<label for="direccion">Direccion - Calle</label>
				<input type="text" name="direccion" class="form-control" value="{{ $seller->address }}">
			</div>
			<div class="form-group col-md-2">
				<label for="">Verificar</label>
				<button class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> </button>
			</div>
			<div class="form-group  col-md-3">
				<label for="nro_apt">Apt #</label>
				<input type="text" name="nro_apt" class="form-control" value="{{ $seller->number_apt }}" >
			</div>
			<div class="form-group  col-md-4">
				<label for="ciudad">Ciudad</label>
				<input type="text" name="ciudad" class="form-control" value="{{ $seller->city }}">
			</div>
			<div class="form-group col-md-4">
				<label for="estado">Estado</label>
				<input type="text" name="estado" class="form-control" value="{{ $seller->state }}">
			</div>
			<div class="form-group col-md-4">
				<label for="zip_code">ZIP CODE</label>
				<input type="text" name="zip_code" class="form-control" value="{{ $seller->zip_code }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-4">
				<label for="fechaInicio">Fecha de Inicio</label>
				<input type="date" name="fechaInicio" class="form-control" value="{{ $seller->date_init }}">
			</div>
			<div class="form-group col-md-12">
				<label for="pagoxcomisiones">Acuerdo de Pago por Comisiones</label>
				<textarea name="pagoxcomisiones" id="" rows="2" class="form-control">{{ $seller->payxcomission }}</textarea>
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
