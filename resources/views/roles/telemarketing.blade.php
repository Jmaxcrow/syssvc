
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{!! route('clients.index') !!}">List. Clientes</a></li>
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
  <li class="dropdown">
    <a href="/telemarketingfa/leaveSeller">Cambiar de Vendedor</a>
  </li>

