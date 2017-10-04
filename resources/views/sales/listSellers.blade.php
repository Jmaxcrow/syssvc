@extends('principal')
<?php $i=0; ?>
@section('title')
	:: Listado de Vendedores ::
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
	<h3>Listado de Vendedores</h3>
	<table class="table table-hover table-stripped">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Ciudad</th>
				<th>Accion</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>

		@foreach ( $sellers as $seller )
		<?php
			$i = $i + 1;
		?>	
			<tr>
				<td><span class="nro">{{ $i }}</span></a></td>
				<td><span id="nombre1" data-value="{{ $seller->name }}"></span>{{ $seller->name }}</a></td>
				<td><span id="apellido1" data-value="{{ $seller->lastname }}"></span>{{ $seller->lastname }}</a></td>
				<td>{{ $seller->address }}, {{ $seller->state }}</td>
				<td><a href="{{ route('sales.show', ['id' => $seller->idSeller]) }}" class="ver" target="_blank"><span class="glyphicon glyphicon-eye-open"></span> Ver</a></td>
				<td><a href="{{ route('sales.edit', [ 'id' => $seller->idSeller ]) }}" class="editar toedit"><span class="glyphicon glyphicon-edit"></span> Editar</a></td>
			</tr>
		@endforeach
			
		</tbody>
	</table>

	
@stop