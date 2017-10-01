	<li class="active dropdown">
  	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registrar <span class="caret"></span></a>
  	<ul class="dropdown-menu">
  		<li><a href="{!! route('clients.create') !!}">Reg. Cliente</a></li>
  		<li><a href="{!! route('telemarketing.create') !!}">Reg. Telemarketing</a></li>
  		<li><a href="{!! route('sales.create') !!}">Reg. Vendedor</a></li>
  	</ul>
  </li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{!! route('clients.index') !!}">List. Clientes</a></li>
        <li><a href="{!! route('telemarketing.index') !!}">List. Telemarketing</a></li>
        <li><a href="{!! route('sales.index') !!}">List. Vendedores</a></li>
    </ul>
  </li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Citas <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{!! route('dates.create') !!}">Generar Cita</a></li>
         <li><a href="{!! route('dates.index') !!}">Lista de Citas</a></li>
    </ul>
  </li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LLamadas <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{!! route('calls.index') !!}">Pendientes de llamadas</a></li>
    </ul>
  </li>

