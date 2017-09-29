<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Creando Cita</title>
	{!! Html::style('assets/css/bootstrap.min.css') !!}
	<style>
		#companiero {
			display: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Generacion de nueva Cita</h2>
		<form action="">
			<div class="form-group col-md-12">
				<label for="cliente">Cliente</label>
				<input type="text" name="cliente" value="{{ 'Nombres y Apellidos del Cliente' }}" maxlength="125" data-id="{{ 'idCliente' }}" class="form-control">
			</div>
			<div class="form-group col-md-12">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" value="{{  'Direccion Completa del Cliente a Visitar' }}" data-value="{{ 'Direccion' }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="fecha">Fecha de la Visita</label>
				<input type="date" name="fechaVisita" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="hora">Hora de la Visita</label>
				<input type="text" name="horaVisita" class="form-control">
			</div>
			<div class="form-group col-md-10">
				<label for="vendedor">Asignar Vendedor</label>
				<input type="text" name="vendedor" value="{{ 'Lista desplegable para seleccionar vendedor' }}" class="form-control">
			</div>
			<div class="form-group col-md-2">
				<label for="agregar">Agregar Acompañante</label>
				<button type="button" id="addPartner" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span></button>
			</div>
			<div class="form-group col-md-10">
				<input type="text" name="companiero" id="companiero" value="{{ 'Posible vendedor - Acompañante' }}" class="form-control">
			</div>
			<div class="form-group col-md-12">
				<label for="notas">Notas acerca del Cliente</label>
				<textarea name="notas" id="" rows="10" class="form-control">{{ 'Notas acerca del Cliente' }}</textarea>
			</div>
			<div class="form-group col-md-4">
				<button type="submit" class="btn btn-large btn-success">Generar Cita</button>
			</div>
		</form>
		<h3 style="color: blue;">Nota: Al pulsar el boton Generar Cita. Automaticamente se enviara el email al vendedor y si es el caso, al compañero tambien.</h3>
	</div>
	{!! Html::script('assets/js/jquery.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
	<script>
		$(document).ready(function() {
			$('#addPartner').click(function() {
				$('#companiero').css('display', 'block');
			});
		});
	</script>
</body>
</html>