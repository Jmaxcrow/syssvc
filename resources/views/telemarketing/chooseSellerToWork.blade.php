@extends('layout_dashboard')

@section('title')
 :: Escoger Vendedor ::
@stop

@section('content')
	<style>
		h1 {
			color: blue;
		}
	</style>
	<div class="container">
		<h1>Antes de Comenzar. Primero escoja el vendedor con el que trabajara ahora. </h1>
		<table class="table table-hover table-stripped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>

		@foreach ( $sellers as $seller )
			<tr>
				<td><span id="nombre1" data-value="{{ $seller->name }}"></span>{{ $seller->name }}</a></td>
				<td><span id="apellido1" data-value="{{ $seller->lastname }}"></span>{{ $seller->lastname }}</a></td>
				<td><a href="/telemarketingfa/choosedSeller/id/{{$seller->idSeller }}" class="ver"> Escoger</a></td>
			</tr>
		@endforeach
			
		</tbody>
	</table>
	</div>

@stop
