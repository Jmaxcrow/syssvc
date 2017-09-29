{!! Html::style('assets/css/bootstrap.min.css') !!}

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Vendedors</title>
	<style>
		.nro, .editar, .eliminar {
			font-weight: bold;
			color: black;
		}

		#eliminarVendedor .modal-body p {
			color: red;
		}
		a.editar {
			color: green;
			font-style: none;
		}
		
		a.eliminar {
			color: red;
			font-style: none;
		}


	</style>
</head>
<body>
	<div class="container">
		<h3>Listado de Vendedors</h3>
		<table class="table table-hover table-stripped">
			<thead>
				<tr>
					<th>Nro</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Telefono</th>
					<th>Ciudad</th>
					<th>Accion</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="#" role="button" data-toggle="modal" data-target="#verVendedor" data-row="1" data-value="1" class="seeSeller"><span class="nro">1</span></a></td>
					<td><a href="#" role="button" data-toggle="modal" data-target="#verVendedor" data-row="1" data-value="1" class="seeSeller"><span id="nombre1" data-value="Juan"></span>Juan</a></td>
					<td><a href="#" role="button" data-toggle="modal" data-target="#verVendedor" data-row="1" data-value="1" class="seeSeller"><span id="apellido1" data-value="Guerero"></span>Guerero</a></td>
					<td><span data-toggle="tooltip" data-placement="top" title="Llamar"><span class="glyphicon glyphicon-earphone"></span> 999666111</span></a></td>
					<td><a href="#">New York</a></td>
					<td><a href="#" role="button" data-toggle="modal" data-target="#editarVendedor" data-row="1" data-value="1" class="editar toedit"><span class="glyphicon glyphicon-edit"></span> Editar</a></td>
					<td><a href="#" role="button" data-toggle="modal" data-target="#eliminarVendedor" data-row="1" data-value="1" class="eliminar todelete"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></td>
				</tr>
				<tr>
					<td><a href="#" role="button" data-toggle="modal" data-target="#verVendedor" data-row="2" data-value="4" class="seeSeller"><span class="nro">2</span></a></td>
					<td><a href="#" role="button" data-toggle="modal" data-target="#verVendedor" data-row="2" data-value="4" class="seeSeller"><span id="nombre2" data-value="Karla"></span>Karla</a></td>
					<td><a href="#" role="button" data-toggle="modal" data-target="#verVendedor" data-row="2" data-value="4" class="seeSeller"><span id="apellido2" data-value="Avalos"></span>Avalos</a></td>
					<td><span data-toggle="tooltip" data-placement="top" title="Llamar"><span class="glyphicon glyphicon-earphone"></span> 999666111</span></a></td>
					<td><a href="#">New York</a></td>
					<td><a href="#" role="button" data-toggle="modal" data-target="#editarVendedor" data-row="1" data-value="1" class="editar toedit"><span class="glyphicon glyphicon-edit"></span> Editar</a></td>
					<td><a href="#" role="button" data-toggle="modal" data-target="#eliminarVendedor" data-row="2" data-value="4" class="eliminar todelete"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></td>
				</tr>
			</tbody>
		</table>
		
		<!-- Editar Vendedor -->
		<div class="modal fade" tabindex="-1" role="dialog" id="editarVendedor">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h3 class="modal-title" style="color: green; font-weight: bold;">Editar Vendedor</h3>
		      </div>
		      <div class="modal-body">
		        <p>
		        	@include('sellers.editSeller')
		        </p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	
		<!-- Eliminar Vendedor -->
		<div class="modal fade" tabindex="-1" role="dialog" id="eliminarVendedor">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		       	<h3 class="modal-title" style="color: red; font-weight: bold;">Eliminar Vendedor</h3>
		      </div>
		      <div class="modal-body">
		        <p>
		        	¿ Desea Eliminar al Vendedor <a href="#" role="button" data-toggle="modal" data-target="#verVendedor" id="name_to_delete" data-row="1" data-value="1" class="seeSeller"></a> ?
		        </p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" id="lastDelete" value="" >Sí</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		
		<!-- Ver Vendedor -->
		<div class="modal fade" tabindex="-1" role="dialog" id="verVendedor">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		       	<h3 class="modal-title" style="color: blue; font-weight: bold;">Ver Vendedor</h3>
		      </div>
		      <div class="modal-body">
		        <p>
		        	@include('sellers.seeSeller')
		        </p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>

	{!! Html::script('assets/js/jquery.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}

	<script>
		$(document).ready(function () {

			$('.todelete').click(function () {
				var nro = $(this).attr('data-row');
				var Vendedor = $('#nombre'+nro).attr('data-value') + ' ' + $('#apellido'+nro).attr('data-value');
				var idVendedor = $(this).attr('data-value');
				$('#name_to_delete').text(Vendedor);
				$('#name_to_delete').attr('data-row', nro);
				$('#name_to_delete').attr('data-value', idVendedor);
				$('#lastDelete').attr('value', idVendedor);
			});
		});
	</script>
</body>
</html>