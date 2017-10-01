@extends('layout_dashboard')

@section('title')
	:: Cambio de Password ::
@stop

@section('content')

<div class="container">
	{!! Form::open(['route' => 'auth/changePassword', 'method' => 'PUT', 'class' => 'col-md-4 col-md-offset-4']) !!}
		{!! csrf_field() !!}
		<input name="id" type="hidden" value="{{ $user->idUser }}">
		<div class="form-group">
			<label for="password">Nuevo Password</label>
			<input type="password" name="password" id="password" maxlength="16" class="form-control">
		</div>
		<div class="form-group">
			<label for="repeatchangepassword">Repetir Password</label>
			<input type="password" name="re_password" id="re-password" maxlength="16" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" id="verify" class="btn btn-info">Actualizar Contraseña</button>
		</div>
	{!! Form::close() !!}
</div>
@stop

@section('script')

	<script>
		$('document').ready(function() {
			$('#verify').click(function() {
				var pass = $('#password').val();
				var re_pass = $('#re-password').val();
				if (pass.localeCompare(re_pass) != 0) {
					alert("Las claves no coinciden");
					return false;
				}
				else
				{
					return true;
				}
			});
		});
	</script>

@stop