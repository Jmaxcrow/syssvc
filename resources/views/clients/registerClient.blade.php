@extends('principal')

@section('title')
	:: Registrar Cliente ::
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
		{{!! Form::open(['route'=>'clients.store', 'method' => 'POST']) !!}
			{!! csrf_field() !!}
			<h2 class="col-md-12">Registro de Cliente</h2>
			<div class="col-md-12">
				<div class="form-group col-md-2">
					<label for="celular">Telef. Celular</label>
					<input type="text" name="celular" class="form-control" tabindex="1">
				</div>
				<div class="form-group col-md-2">
					<label for="casa">Telef. Casa</label>
					<input type="text" name="casa" class="form-control" tabindex="2">
				</div>
				<div class="form-group col-md-2">
					<label for="">Verificar</label>
					<button class="btn btn-warning form-control" tabindex="3" ><span class="glyphicon glyphicon-ok"></span> </button>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group col-md-5">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" maxlength="50" class="form-control" tabindex="4">
				</div>
				<div class="form-group col-md-7">
					<label for="apellido">Apellidos</label>
					<input type="text" name="apellido" maxlength="75" class="form-control" tabindex="5">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group col-md-4">
					<label for="fecha_nacimiento">Fecha Nacimiento</label>
					<input type="date" name="fecha_nacimiento" class="form-control">
				</div>
				<div class="form-group col-md-3">
					<label for="genero">Genero</label>
					<div class="radio">
					 	<label>
					    		<input type="radio" name="genero" id="" value="H" checked>
					    		Hombre
					 	 </label>
					</div>
					<div class="radio">
					 	<label>
					    		<input type="radio" name="genero" id="" value="M">
					    		Mujer
					 	 </label>
					</div>
				</div>
				<div class="form-group col-md-2">
					<label for="genero">Cliente</label>
					<div class="radio">
					 	<label>
					    		<input type="radio" name="esCliente" id="" value="1" checked>
					    		Sí
					 	 </label>
					</div>
					<div class="radio">
					 	<label>
					    		<input type="radio" name="esCliente" id="" value="0">
					    		No
					 	 </label>
					</div>
				</div>
				<div class="form-group col-md-2">
					<label for="genero">Trabaja</label>
					<div class="radio">
					 	<label>
					    		<input type="radio" name="trabaja" id="" value="1" checked>
					    		Sí
					 	 </label>
					</div>
					<div class="radio">
					 	<label>
					    		<input type="radio" name="trabaja" id="" value="0">
					    		No
					 	 </label>
					</div>
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
					<label for="nroCuenta">Nro de Cuenta</label>
					<input type="text" name="nroCuenta" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label for="zone">Zona</label>
					<select name="zone" id="zona" class="form-control">
						<option  selected="true" disabled="true">Selec. Zona</option>
						@foreach(	$zones as $zona )
							<option value="{{ $zona->idZona }}">{{ $zona->name }}</option>
						@endforeach
						<option value="other">Otro</option>
					</select>
				</div>
				<div class="form-group col-md-12">
					<label for="comentarios">Comentarios</label>
					<textarea name="comentarios" class="form-control" id="" rows="2"></textarea>
				</div>
			</div>
			<div class="col-md-9">
				<div class="form-group col-md-3">
					<label for="origen_cliente">Origen del Cliente</label>
					<select name="origen_cliente" id="origen_cliente" class="form-control">
						<option  selected="true" disabled="true">Selec. Origen</option>
						@foreach(	$origins as $origen_cliente  )
							<option value="{{ $origen_cliente->idOrigin }}">{{ $origen_cliente->name }}</option>
						@endforeach
						<option value="other">Otro</option>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label for="sub_origen">Sub Categoria</label>
					<select name="sub_origen" id="sub_origen" class="form-control">
						<option  selected="true" disabled="true">Selec. Sub Categoria</option>
						@foreach(	$sub_origins as $sub_origin  )
							<option value="{{ $sub_origin->idSubOrigin }}">{{ $sub_origin->name }}</option>
						@endforeach
						<option value="other">Otro</option>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label for="fecha_origen">Fecha Origen</label>
					<input type="date" name="fecha_origen" class="form-control">
				</div>
				<div class="form-group col-md-3">
					<label for="hora_origen">Hora Origen</label>
					<input type="text" name="hora_origen" class="form-control">
				</div>
			</div>
			<div class="col-md-3">
				<button type="submit" class="btn btn-lg btn-primary">Registrar</button>
			</div>
	<!-- Nueva Zona -->
		<div class="modal fade" tabindex="-1" role="dialog" id="nuevaZona">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h3 class="modal-title" style="color: green; font-weight: bold;">Nueva Zona</h3>
		      </div>
		      <div class="modal-body">
		        
		        	<div class="form-group col-md-6">
		        		<input type="text" name="nuevaZona" class="form-control" focus>
		        	</div>
		        
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-danger" id="newZone">Aceptar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!-- Nueva Origen -->
		<div class="modal fade" tabindex="-1" role="dialog" id="nuevoOrigen">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h3 class="modal-title" style="color: green; font-weight: bold;">Nuevo Origen</h3>
		      </div>
		      <div class="modal-body">
		        
		        	<div class="form-group col-md-6">
		        		<input type="text" name="nuevoOrigen" class="form-control" focus>
		        	</div>
		        
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-danger" id="newOrigin">Aceptar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!-- Nueva SubOrigen -->
		<div class="modal fade" tabindex="-1" role="dialog" id="nuevoSubOrigen">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h3 class="modal-title" style="color: green; font-weight: bold;">Nueva Sub Cateogria</h3>
		      </div>
		      <div class="modal-body">
		        
		        	<div class="form-group col-md-6">
		        		<input type="text" name="nuevoSubOrigen" class="form-control" maxlength="20" focus>
		        	</div>
		        
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-danger" id="newSubOrigin">Aceptar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		{{!! Form::close() !!}
	</div>
	
@stop

@section('script')

<script>
		$(document).ready(function() {
			$('#zona').change(function() {
				if (this.value == 'other') {
					$('#nuevaZona').modal('show');
					$("input[name='nuevaZona']").focus();
				}
			});

			$('#origen_cliente').change(function() {
				if (this.value == 'other') {
					$('#nuevoOrigen').modal('show');
					$("input[name='nuevoOrigen']").focus();
				}
			});

			$('#sub_origen').change(function() {
				if (this.value == 'other') {
					$('#nuevoSubOrigen').modal('show');
					$("input[name='nuevoSubOrigen']").focus();
				}
			});

			$('#newZone').click(function(){
				$('#nuevaZona').modal('hide');
				var nuevaZona = $("input[name='nuevaZona']").val()
				if (nuevaZona.length > 0) {
					$('form').after('<span class="col-md-12" style="color: white;"> Se creara nueva Zona ' + nuevaZona  + ' </span>');
				}
			});

			$('#newOrigin').click(function(){
				$('#nuevoOrigen').modal('hide');
				var nuevoOrigen = $("input[name='nuevoOrigen']").val()
				if (nuevoOrigen.length > 0) {
					$('form').after('<span class="col-md-12" style="color: white;"> Se creara nuevo Origen ' + nuevoOrigen   + ' </span>');
				}
			});

			$('#newSubOrigin').click(function(){
				$('#nuevoSubOrigen').modal('hide');
				var nuevoSubOrigen = $("input[name='nuevoSubOrigen']").val()
				if (nuevoSubOrigen.length > 0) {
					$('form').after('<span class="col-md-12" style="color: white;"> Se creara nuevo SubOrigen ' + nuevoSubOrigen  + ' </span>');
				}
			});

		});
	</script>

@stop
	