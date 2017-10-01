<h1>Bienvenido {{ $name }}</h1>

<p>Para ingresar y empezar a laborar. Porfavor confirma tu cuenta</p>

<a href="{{ url() }}/auth/confirm/email/{{$email}}/confirm_token/{{ $confirm_token }}}">Confirmar mi cuenta</a>