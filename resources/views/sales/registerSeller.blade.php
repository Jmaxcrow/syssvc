{!! Html::style('assets/css/bootstrap.min.css') !!}

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de Vendedor</title>
	<style>
		.container {
			background: rgba(32, 32, 76, 1);
		}
		form h2, form label {
			color: white;
		}
	</style>
</head>
<body>
	<div class="container">
		{!! Form::open(['route'=>'clients.store', 'method'=>'POST']) !!}
			{!! csrf_field() !!}
			<h2 class="col-md-12">Registro de Vendedor</h2>
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
				<div class="form-group col-md-6">
					<label for="level">Nivel de Jerarquia</label>
					<select name="level" id="" class="form-control">
						<option value="Master">Master</option>
						<option value="Spin Out">Spin Out</option>
						<option value="Director">Director</option>
						<option value="Royal">Royal</option>
						<option value="Blue">Blue</option>
						<option value="Nivel 1">Nivel 1</option>
						<option value="Nivel 2">Nivel 2</option>
						<option value="Nivel 3">Nivel 3</option>
						<option value="Joint Venture">Joint Venture</option>
						<option value="New Comer">New Comer</option>
					</select>
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
					<label for="ciudad">Apt #</label>
					<input type="text" name="ciudad" class="form-control">
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
				<div class="form-group col-md-8">
					<label for="inserted_by">Reclutado Por</label>
					<select name="inserted_by" id="" class="form-control">
						@foreach($sellers	as $seller)
							<option value="{{$seller->id}}">{{$seller->name.' '.$seller->lastname}}</option>
						@endforeach
					</select>
				</div>
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
					<button type="button" class="btn btn-lg btn-primary">Registrar</button>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</body>
</html>