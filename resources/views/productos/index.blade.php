@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Productos </h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('productos.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>

  @if (isset($productos) && $productos->count() > 0)
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Materia Prima</caption>
          <thead>
            <tr>
              <th>TP</th>
              <th>SKU</th>
              <th>CategoriaTipo</th>
              <th>Sub Tipo</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Unidad</th>
              <th>Propiedades</th>
              <th>Importado</th>
              <th>Min</th>
              <th>Max</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $element)
            <tr>
              <td>{{ @$element->tipo->tipo }}</td>
              <td>{{ @$element->sku }}</td>
              <td>{{ @$element->tipo->nombre }}</td>
              <td>{{ @$element->subtipo->nombre }}</td>
              <td>{{ $element->nombre }}</td>
              <td>{{ $element->descripcion }}</td>
              <td>{{ @$element->unidad->nombre }}</td>
              <td>
                <a class="btn btn-sm btn-info" href="#" title="" @click="getPro({{ $element->id }})">Prop-Ext</a>
              </td>
              <td>{{ $element->importado }}</td>
              <td>{{ $element->min }}</td>
              <td>{{ $element->max }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $productos->links() }}
      </div>
    </div>
  </div>
  @else
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="alert alert-primary" role="alert">
        Sin registros de Productos - Productos!
      </div>
    </div>
  </div>
  @endif

</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var app = new Vue({
    el: '#app',
    data: {
      propiedades: []
    },
    methods: {
      getPro: function(producto){
        axios.get('/getPropiedades/' + producto)
        .then( response => {
          this.propiedades = response.data;
           swal('Propiedades', JSON.stringify(response.data),'success');
        })
      }
    }
  })
</script>
@endsection