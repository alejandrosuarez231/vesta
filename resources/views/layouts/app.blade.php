<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

  @yield('css')

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style type="text/css" media="screen">
  .bg-company-blue {
    background-color: #203864;
  }
</style>
<style scoped>
[v-cloak]{
  display:none;
}
</style>
</head>
<body>
  <div id="app">
    <!-- NavBar -->
    <nav class="navbar navbar-expand-md navbar-laravel navbar-dark bg-company-blue">
      <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          {{-- <li class="nav-item active">
            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard </a>
          </li> --}}
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/home') }}">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cotizaciones.create') }}" title="Cotizar">Cotizar</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Lista de Modulos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('backend/modulos') }}" title="Lista de Modulos">Listado</a>
              <a class="dropdown-item" href="{{ url('backend/modulos/piezas') }}" title="Piezas">Piezas</a>
              <a class="dropdown-item" href="{{ url('backend/modulos/complementos') }}" title="Complementos">Complementos</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/backend/skus')}}" title="SKUs">Lista de SKU's</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Herrajes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('backend/correderas') }}" title="Correderas">Correderas</a>
              <a class="dropdown-item" href="{{ url('backend/bisagras') }}" title="Bisagras">Bisagras</a>
              <a class="dropdown-item" href="{{ url('backend/brapes') }}" title="Brazos de Apertura">Brapes</a>
              <a class="dropdown-item" href="{{ url('backend/tiradores') }}" title="Tiradores">Tiradores</a>

            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('productos.index') }}" title="Productos">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('proyectos.index') }}" title="Proyectos">Lista de Materiales</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="#" title="Categorias">Inventario</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="#" title="Proveedores">Proveedores</a>
          </li> --}}
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Compras
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#" title="Orden de compra">Orde de Compra</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" title="Compras">Compras</a>
            </div>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li> --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Configuración
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('backend/tipos') }}">Tipos</a>
              <a class="dropdown-item" href="{{ url('backend/subtipos') }}">Sub-Tipos</a>
              <a class="dropdown-item" href="{{ url('backend/categorias') }}">Categorias</a>
              <a class="dropdown-item" href="{{ url('backend/unidades') }}" title="Unidades">Unidades</a>
              <a class="dropdown-item" href="{{ url('backend/marcas') }}" title="Marcas">Marcas</a>
              <a class="dropdown-item" href="{{ url('backend/colores') }}" title="Colores">Colores</a>
              <a class="dropdown-item" href="{{ url('backend/tableros') }}" title="Tableros">Tableros</a>
              <a class="dropdown-item" href="{{ url('backend/materiales') }}" title="Materiales">Materiales</a>
              <a class="dropdown-item" href="{{ url('backend/confparts') }}" title="ConfParts">Conf-Mat</a>
              <a class="dropdown-item" href="{{ url('backend/confmats') }}" title="ConfMats">Asig-Mat</a>
              <a class="dropdown-item" href="{{ url('backend/modulos') }}" title="Modulos">Modulos</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('backend/codigos') }}" title="Codigos">Codigos</a>
              <a class="dropdown-item" href="{{ route('extras.create') }}" title="Extras">Props. Extras</a>
              <a class="dropdown-item" href="{{ url('backend/extras') }}">Set Props. Extras</a>
              <a class="dropdown-item disabled" href="#">Usuarios</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/zohoClientes') }}" target="_blank" title="ZohoClients">Zoho-Clientes</a>
              <a class="dropdown-item" href="{{ url('/zohoProductos') }}" target="_blank" title="ZohoProducts">Zoho-Productos</a>
              <a class="dropdown-item" href="{{ url('/inventario') }}" title="ZohoInventario">Zoho-Inventario</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
          <button class="btn btn-outline-light my-2 my-sm-0 disabled" type="submit">Buscar</button>
        </form>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </nav>
  <!-- NavBar -->

  <main class="py-4">
    <!-- Include this after the sweet alert js file -->
    {{-- @include('sweet::alert') --}}
    @include('sweetalert::alert')
    @yield('content')
  </main>
</div>
<script type="text/javascript">
  $(function () {
    console.log('jQuery-Run');
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<!-- DataTables -->
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
@yield('scripts')
</body>
</html>
