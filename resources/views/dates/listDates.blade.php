<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de Citas</title>
	{!! Html::style('assets/css/bootstrap.min.css') !!}
	
</head>
<body>
	<div class="container">
		<h2>Listado de Citas</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nro Cita</th>
					<th>Cliente</th>
					<th>Direccion</th>
					<th>Vendedor</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Accion</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>{{ 'Cliente 1' }}</td>
					<td>{{ 'Direccion Completa del Cliente' }}</td>
					<td>{{ 'Vendedor Asignado' }}</td>
					<td>{{ '18/09/2017' }}</td>
					<td>{{ '5:05 pm' }}</td>
					<td><a href="#">Postergar</a></td>
					<td><a href="#" data-toggle="modal" data-target="#finalizar" >Finalizar</a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>{{ 'Cliente 2' }}</td>
					<td>{{ 'Direccion Completa del Cliente' }}</td>
					<td>{{ 'Vendedor Asignado' }}</td>
					<td>{{ '18/09/2017' }}</td>
					<td>{{ '5:05 pm' }}</td>
					<td><a href="#">Postergar</a></td>
					<td><a href="#" data-toggle="modal" data-target="#finalizar" >Finalizar</a></td>
				</tr>
			</tbody>
		</table>

		<!-- Opciones de la LLamada al Cliente -->
		<div class="modal fade" tabindex="-1" role="dialog" id="finalizar">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		       	<h3 class="modal-title" style="color: orange; font-weight: bold;">Finalizando La Visita (Cita con el Cliente)</h3>
		      </div>
		      <div class="modal-body">
		       		<div class="form-group">
		       			<div class="radio">
		       				<label>
		       					<input type="radio" name="opcionesFinalizar" value="0">  Acepto Venta
		       				</label>
		       			</div>
		       		</div>
		       		<div class="form-group">
		       			<div class="radio">
		       				<label>
		       					<input type="radio" name="opcionesFinalizar" value="1"> No acepto Venta
		       				</label>
		       			</div>
		       		</div>
		       		<div class="form-group">
		       			<div class="radio">
		       				<label>
		       					<input type="radio" name="opcionesFinalizar" value="2"> No reside
		       				</label>
		       			</div>
		       		</div>
		      </div>
		      <div class="modal-footer">
		      <!--	<form action="/control/llamadas" method="post"> -->
		      		{!! csrf_field();  !!}
		        	<button type="submit" name="opcionFinalizar" id="EnviarOpcion" class="btn btn-warning" value="">Aceptar</button>
		      <!--	</form>-->
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
	{!! Html::script('assets/js/jquery.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
	<script>
		$(document).ready(function() {
			$('#EnviarOpcion').click(function() {
				var opcionFinalizar = $("input[name='opcionesFinalizar']:checked").val();
				$('#EnviarOpcion').attr('value', opcionFinalizar);
				alert("Segun la opcion de finalizar, se ejecutara una accion en el sistema. \n 1. Formulario para finalizar cita \n 2. Formulario para postergar nueva Cita \n 3. Se bloquea el registro, hasta nueva actualizacion de la direccion del cliente.");
			});
		});
	</script>
</body>
</html>