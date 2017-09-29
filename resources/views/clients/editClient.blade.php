<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editando Cliente</title>
	{!! Html::style('assets/css/bootstrap.min.css') !!}
</head>
<body>
	<div class="container">
		<form action="" method="post">
			<div class="form-group col-md-5">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" maxlength="50" class="form-control">
			</div>
			<div class="form-group col-md-7">
				<label for="apellido">Apellidos</label>
				<input type="text" name="apellido" maxlength="75" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="celular">Telef. Celular</label>
				<input type="text" name="celular" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="casa">Telef. Casa</label>
				<input type="text" name="casa" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="t_trabajo">Telef. Trabajo</label>
				<input type="text" name="t_trabajo" class="form-control">
			</div>
			<div class="form-group col-md-9">
				<label for="direccion">Direccion - Calle</label>
				<input type="text" name="direccion" class="form-control">
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
			<div class="form-group col-md-8">
				<label for="email">Email</label>
				<input type="text" name="email" class="form-control">
			</div>
			<div class="form-group col-md-5">
				<label for="lugar">Lugar</label>
				<input type="text" name="lugar" class="form-control">
			</div>
			<div class="form-group col-md-3">
				<label for="fecha">Fecha</label>
				<input type="date" name="fecha" class="form-control">
			</div>
			<div class="form-group col-md-3">
				<label for="hora">Hora</label>
				<input type="text" name="hora" class="form-control">
			</div>
			<div class="form-group col-md-7">
				<label for="abordador_por">Abordado Por</label>
				<input type="text" name="abordador_por" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<button type="button" class="btn btn-lg btn-success">Actualizar</button>
			</div>
		</form>
	</div>
	
	{!! Html::script('assets/js/jquery.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
</body>
</html>