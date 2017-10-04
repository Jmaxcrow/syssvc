@extends('layout_dashboard')

@section('title')
 :: Escoger Telemarketing ::
@stop

@section('content')
	<style>
		h1 {
			color: blue;
		}
	</style>
	<div class="container">
		<h1>Antes de Comenzar. Primero escoja un agente de telemarketing. </h1>
		<a href="/sales/chooseTelemarketing/id/0" class="dont-telemarketing"><h3>No usare ningun agente de Telemarketing</h3></a>
		<table class="table table-hover table-stripped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>

		@foreach ( $telemarketers as $telemarketer )
			<tr>
				<td><span id="nombre1" data-value="{{ $telemarketer->name }}"></span>{{ $telemarketer->name }}</a></td>
				<td><span id="apellido1" data-value="{{ $telemarketer->lastname }}"></span>{{ $telemarketer->lastname }}</a></td>
				<td><a href="/sales/chooseTelemarketing/id/{{$telemarketer->idTelemarketer }}" class="ver"> Escoger</a></td>
			</tr>
		@endforeach
			
		</tbody>
	</table>
	</div>

@stop

@section('script')
	<script>
		$(document).ready(function() {
			$('.dont-telemarketing').click(function() {
				alert('Se registrará a Ud. como telemarketer');
			})
		});
	</script>
@stop