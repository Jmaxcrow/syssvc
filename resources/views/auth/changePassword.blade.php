@extends('principal')

@section('title')
	:: Cambio de Password ::
@stop

@section('content')

<div class="container">
	{!! Form::open(['route' => ['auth.update', 'id' => $user->idUser], 'method' => 'PUT', 'class' => 'col-md-6 col-md-offset-6']) !!}
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="changepassword">Nuevo Password</label>
			<input type="password" name="password" id="password" maxlength="16">
		</div>
		<div class="form-group">
			<label for="repeatchangepassword">Repetir Password</label>
			<input type="repeatpassword" name="re-password" id="re-password" maxlength="16">
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