<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Historial del Cliente</title>
	{!! Html::style('assets/css/bootstrap.min.css') !!}
</head>
<body>
	<div class="container">
		<h2>Historial del Cliente: {{ 'Ricardo Solano' }} </h2>

		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nro</th>
					<th>Descripcion</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Hecha Por</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Se registro como nuevo Cliente</td>
					<td>16/09/2017</td>
					<td>9:37 am</td>
					<td>Josué Barrantes</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Se registro como nuevo Referente</td>
					<td>16/09/2017</td>
					<td>9:50 am</td>
					<td>Josué Barrantes</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Se registro promesa de producto o servicio al Cliente</td>
					<td>16/09/2017</td>
					<td>9:54 am</td>
					<td>Luis Salazar</td>
				</tr>
			</tbody>
		</table>
	</div>

	{!! Html::style('assets/js/jquery.js') !!}
	{!! Html::style('assets/js/bootstrap.min.js') !!}
</body>
</html>