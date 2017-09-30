<h1>Bienvenido {{ $data['name'] }}</h1>

<p>Para ingresar y empezar a laborar. Porfavor confirma tu cuenta</p>

<a href="{{ url() }}/auth/confirm/email/{{ $data['email'] }}/confirm_token/{{ $data['confirm_token'] }}">Confirmar mi cuenta</a>