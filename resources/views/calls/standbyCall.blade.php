<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Posponer Llamada</title>
	{!! Html::style('assets/css/bootstrap.min.css') !!}
	
</head>
<body>
	<div class="container">
		<h2>Nuevo Pendiente de Llamada</h2>
		<h4>Cliente: {{ 'Cliente a Postergar' }}</h2>
		<form action="">
			<h4>
				Numero de llamadas: 
				{{ 'Se obtendra automaticamente cuantas veces llamo el Cliente, si es > 5. automaticamente se le mostrara si desea volcarlo al archivo muerto o postergarlo una vez mas' }}
			</h4>
			<div class="form-group col-md-12">
				<label for="descripcion">Descripción</label>
				<select name="descripcion" id="" class="form-control">
					<option value="0">1. El cliente no contesto.</option>
					<option value="1">2. Supero el limite de llamadas no Contestadas</option>
					<option value="2">3. El cliente desea que lo llamen en otro momento</option>
					<option value="3">4. El cliente no desea el producto o servicio. Postergar al otro mes la llamada</option>
					<option value="4">5. Otro</option>
				</select>
			</div>
			<h3 style="color: blue;">Nota: Dependiendo de la eleccion de la descripcion se activara, desactivara los campos siguientes</h3>
			<div class="form-group col-md-12">
				<textarea name="razon" id="" rows="10" class="form-control">{{ 'Valido para las opciones 2, 3, 4, 5' }}</textarea>
			</div>
			<div class="form-group col-md-6">
				<label for="fecha">Fecha a Postergar</label>
				<input type="date" name="fechaPostergar" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="hora">Hora a Postergar</label>
				<input type="text" name="horaPostergar" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<button type="submit" class="btn btn-primary btn-large">Postergar Llamada al Cliente</button>
			</div>
		</form>
	</div>
	{!! Html::script('assets/js/jquery.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
	<script>
		
	</script>
</body>
</html>