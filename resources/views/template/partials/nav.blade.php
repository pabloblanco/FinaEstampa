<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DrinkPlis!</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <!-- Authentication Links -->
    @if (Auth::guest())
    
    @else
      <ul class="nav navbar-nav">
        <li><a href="http://debian1.makingsense.com:803">Dashboard </a></li>
        <li class="active"><a href="{{ route('admin.users.index') }}">Usuarios <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catalogo<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('admin.categories.index') }}">Categorias</a></li>
            <li><a href="{{ route('admin.products.index') }}">Productos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('admin.orders.index') }}">Pedidos</a></li>
            <li><a href="{{ route('admin.carts.index') }}">Carritos</a></li>
            <li><a href="{{ route('admin.addresses.index') }}">Direcciones</a></li>              
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('admin.promotions.index') }}">Promociones</a></li>
          </ul>
        </li>
      </ul>
      @endif
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
          @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>

          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->firstname }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('admin.users.create') }}">Registrar</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
              </ul>
            </li>
          @endif
      </ul>
      @yield('scope')
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>