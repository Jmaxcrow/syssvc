<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Login Sys SVC</title>
	{!! Html::style('assets/css/bootstrap.min.css') !!}
	<style>
		a {
			display: block important!;
			margin-bottom: 10px;
			padding-left: 10px;
		}
		body {
			width: 100%;
			background-image: url("/images/edificios-login.png");
			background-size: 100% 100vh;
			background-repeat: no-repeat;
		}
		.message{

		}
		.bg-login{
			margin-top: 5%;
			background: rgba(238,238,238,0.7);
			padding-bottom: 10px;
			border-radius: 10px;
		}
		.bg-login input {
			color: blue;
			font-style: bold;
		}
		.jumbotron {
			background: #4f7dff;
		}
		.jumbotron h1 {
			color: white;
		}
		#btnIngresar:hover,
		#btnIngresar:focus {
			background: white;
			color: blue;
		}
		.errors-form{
			display: block;
			width: 30%;
		}
		.errors-form p{
			padding-left: 5px;
			margin-left: 10px;
			background-color: red;
			color: white;
		}
		@media (max-width: 768px){
			.bg-login {
				margin-top: 50px;
			}
			.jumbotron {
				padding: 5px;
			}
			.jumbotron h1{
				font-size: 18px;
			}
			body {
				font-size: 14px;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="bg-login">
			<div class="jumbotron">
				<h1>SYS SVC</h1>
			</div>
			@if(Session::has('message'))
				<div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>{{ Session::get('message') }}</strong>
				  <?php Session::flush(); ?>
				</div>
			@endif
			<form action="/auth/login" method="POST">
				{!! csrf_field() !!}
				<div class="form-group col-xs-12 col-sm-6">
					<label for="email">Usuario</label>
					<input type="text" maxlength="50" required="true" class="form-control" name="email" id="txtUser">
				</div>
				<div class="form-group col-xs-12 col-sm-6">
					<label for="password">Contraseña</label>
					<input type="password" maxlength="12" required="true" class="form-control" name="password" id="txtPassword">
				</div>
				<div class="form-group col-xs-12">
					<button type="submit" class="btn btn-primary col-xs-offset-4 col-xs-4" id="btnIngresar">Ingresar</button>
				</div>
				<a href="#">Olvide mi Contraseña</a>
			</form>
		</div>
	</div>
	{!! Html::script('assets/js/jquery.js') !!}
	<script>
	$(document).ready(function(){
		$('#txtUser').focus();
	});
	</script>
</body>
</html>