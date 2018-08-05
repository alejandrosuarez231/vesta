@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Proyectos </h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ url("/frontend/constructor/construir") }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>

  @if (isset($proyectos) && $proyectos->count() > 0)
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Listado de Proyectos</caption>
          <thead>
            <tr>
              <th>TP</th>
              <th>SKU</th>
              <th>Tipo</th>
              <th>Sub Tipo</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Unidad</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($proyectos as $element)
            <tr>
              <td>{{ @$element->tipo->tipologia }}</td>
              <td>{{ @$element->sku }}</td>
              <td>{{ @$element->tipo->nombre }}</td>
              <td>{{ @$element->subtipo->nombre }}</td>
              <td>{{ $element->nombre }}</td>
              <td>{{ $element->descripcion }}</td>
              <td>{{ @$element->unidad->nombre }}</td>
              <td>
                <a class="btn btn-sm btn-info" href="{{ route('proyectos.show',['id'=>$element->id]) }}" title="">Ver</a>
                <a class="btn btn-sm btn-warning" href="{{ route('constructor.edit',['id'=>$element->id]) }}" title="Editar">Editar</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $proyectos->links() }}
      </div>
    </div>
  </div>
  @else
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="alert alert-primary" role="alert">
        Sin registros de Modelos - Modelos!
      </div>
    </div>
  </div>
  @endif

</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var app = new Vue({
    el: '#app'
  })
</script>
@endsection