<ol class="breadcrumb">
  <li><a href="\">Inicio</a></li>
@if (Auth::user())
  <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
  <li class="active">Nuevo</li>
@else
      
@endif
</ol>