@extends('principal')
<?php $i=0; ?>
@section('title')
	:: Listado de Clientes ::
@stop

@section('content')
<style>
		.nro, .editar, .eliminar, .ver {
			font-weight: bold;
			color: black;
		}

		#eliminarCliente .modal-body p {
			color: red;
		}

		a.ver {
			color: blue;
			font-style: none;
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
<div class="container">
	@if(strlen($message) > 0)
		<div class="alert alert-info alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>{{$message}}</strong>
		</div>
	@endif
	<h3>Listado de Clientes</h3>
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
				<th>Accion</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>

		@foreach ( $clients as $client )
		<?php
			$i = $i + 1;
		?>	
			<tr>
				<td><span class="nro">{{ $i }}</span></a></td>
				<td><span id="nombre1" data-value="{{ $client->name }}"></span>{{ $client->name }}</a></td>
				<td><span id="apellido1" data-value="{{ $client->lastname }}"></span>{{ $client->lastname }}</a></td>
				<td><a href="#" role="button" data-toggle="modal" data-target="#llamarCliente" data-row="{{ $i }}" data-value="{{ $client->idClient }}" class="callClient"><span data-toggle="tooltip" data-placement="top" title="Llamar"><span class="glyphicon glyphicon-earphone"></span> {{ $client->phone_number }}</span></a></td>
				<td>{{ $client->address }}, {{ $client->state }}</td>
				<td><a href="{{ route('clients.show', ['id' => $client->idClient]) }}" class="ver" target="_blank"><span class="glyphicon glyphicon-eye-open"></span> Ver</a></td>
				<td><a href="{{ route('clients.edit', [ 'id' => $client->idClient ]) }}" class="editar toedit"><span class="glyphicon glyphicon-edit"></span> Editar</a></td>
				<td><a href="#" role="button" data-toggle="modal" data-target="#eliminarCliente" data-row="{{ $i }}" data-value="{{ $client->idClient }}" class="eliminar todelete"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></td>
				<td><a href="#" role="button" data-toggle="modal" data-target="#hacerReferente" data-row="{{ $i }}" data-value="{{ $client->idClient }}" class="doreferent">Hacer Referente</a></td>
			</tr>
		@endforeach
			
		</tbody>
	</table>

	<!-- Eliminar Cliente -->
	<div class="modal fade" tabindex="-1" role="dialog" id="eliminarCliente">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       	<h3 class="modal-title" style="color: red; font-weight: bold;">Eliminar Cliente</h3>
	      </div>
	      <div class="modal-body">
	        <p>
	        	¿ Desea Eliminar al Cliente <a href="#" role="button" data-toggle="modal" data-target="#verCliente" id="name_to_delete" data-row="1" data-value="1" class="seeClient"></a> ?
	        </p>
	      </div>
	      <div class="modal-footer">
	      	{!! Form::open(['route' => ['clients.destroy'], 'method' => 'DELETE' ]) !!}
	      		<button type="submit" class="btn btn-danger" name="clientDelete" id="lastDelete" value="" >Sí</button>	      	
	      	{!! Form::close() !!}
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- Hacer Referente -->
	<div class="modal fade" tabindex="-1" role="dialog" id="hacerReferente">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       	<h3 class="modal-title" style="color: orange; font-weight: bold;">Hacer Referente al Cliente</h3>
	      </div>
	      <div class="modal-body">
	        <p>
	        	¿ Desea hacer un nuevo Referente al Cliente <a href="#" role="button" data-toggle="modal" data-target="#verCliente" id="name_make_referent" data-row="1" data-value="1" class="seeClient"></a> ?
	        </p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning" id="lastReferent" value="" >Sí</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- Llamada a Cliente -->
	<div class="modal fade" tabindex="-1" role="dialog" id="llamarCliente">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       	<h3 class="modal-title" style="color: orange; font-weight: bold;">Llamada al Cliente</h3>
	      </div>
	      <div class="modal-body">
	        <p>
	        	¿ Ha llamado al Cliente <a href="#" role="button" data-toggle="modal" data-target="#verCliente" id="client_called" data-row="1" data-value="1" class="seeClient"></a> previamente ?
	        </p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#verOpcionesLLamada" data-dismiss="modal">Sí</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- Opciones de la LLamada al Cliente -->
	<div class="modal fade" tabindex="-1" role="dialog" id="verOpcionesLLamada">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       	<h3 class="modal-title" style="color: orange; font-weight: bold;">Opciones de Llamada</h3>
	      </div>
	      <div class="modal-body">
	       		<div class="form-group">
	       			<div class="radio">
	       				<label>
	       					<input type="radio" name="opcionesLLamada" value="0"> Ok
	       				</label>
	       			</div>
	       		</div>
	       		<div class="form-group">
	       			<div class="radio">
	       				<label>
	       					<input type="radio" name="opcionesLLamada" value="1"> No Contesta
	       				</label>
	       			</div>
	       		</div>
	       		<div class="form-group">
	       			<div class="radio">
	       				<label>
	       					<input type="radio" name="opcionesLLamada" value="2"> No es el numero Telef.
	       				</label>
	       			</div>
	       		</div>
	       		<div class="form-group">
	       			<div class="radio">
	       				<label>
	       					<input type="radio" name="opcionesLLamada" value="3"> LLamar más tarde
	       				</label>
	       			</div>
	       		</div>
	       		<div class="form-group">
	       			<div class="radio">
	       				<label>
	       					<input type="radio" name="opcionesLLamada" value="4"> No volver a Llamar
	       				</label>
	       			</div>
	       		</div>
	      </div>
	      <div class="modal-footer">
	      <!--	<form action="/control/llamadas" method="post"> -->
	      		{!! csrf_field();  !!}
	        	<button type="submit" name="opcionLLamada" id="EnviarOpcion" class="btn btn-warning" value="">Aceptar</button>
	      <!--	</form>-->
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>
@stop
@section('script')
<script>
	$(document).ready(function () {

		$('.todelete').click(function () {
			var nro = $(this).attr('data-row');
			var cliente = $('#nombre'+nro).attr('data-value') + ' ' + $('#apellido'+nro).attr('data-value');
			var idCliente = $(this).attr('data-value');
			$('#name_to_delete').text(cliente);
			$('#name_to_delete').attr('data-row', nro);
			$('#name_to_delete').attr('data-value', idCliente);
			$('#lastDelete').attr('value', idCliente);

		});

		$('.doreferent').click(function () {
			var nro = $(this).attr('data-row');
			var cliente = $('#nombre'+nro).attr('data-value') + ' ' + $('#apellido'+nro).attr('data-value');
			var idCliente = $(this).attr('data-value');
			$('#name_make_referent').text(cliente);
			$('#name_make_referent').attr('data-row', nro);
			$('#name_make_referent').attr('data-value', idCliente);
			$('#lastReferent').attr('value', idCliente);
		});

		$('.callClient').click(function () {
			var nro = $(this).attr('data-row');
			var cliente = $('#nombre'+nro).attr('data-value') + ' ' + $('#apellido'+nro).attr('data-value');
			var idCliente = $(this).attr('data-value');
			$('#client_called').text(cliente);
			$('#client_called').attr('data-row', nro);
			$('#client_called').attr('data-value', idCliente);
			$('#lastReferent').attr('value', idCliente);
		});

		$('#EnviarOpcion').click(function() {
			var opcionLLamada = $("input[name='opcionesLLamada']:checked").val();
			$('#EnviarOpcion').attr('value', opcionLLamada);
			alert("Segun la opcion de LLamada, se ejecutara una accion en el sistema. \n 1. Generar Cita \n 2. Formulario para postergar LLamada \n 3. Se bloquea el registro, hasta nueva actualizacion del numero. \n 4. Formulario para postergar LLamada e indica motivo \n 5. Formulario para ingresar motivo y enviar a pendientes o volca a archivo muerto");
		});

	});
</script>
	
@stop