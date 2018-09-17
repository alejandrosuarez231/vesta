@extends('layouts.app')
{{-- @extends('adminlte::page') --}}

@section('content')
<div id="app" class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md">
      <h4>Productos </h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/dashboard') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('productos.create') }}" class="nav-link">Nuevo MTP</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md">
      <div class="table-responsive">
        <table id="productos-table" class="table table-striped table-bordered" data-page-length="100">
          <caption>Materia Prima</caption>
          <thead>
            <tr>
              <th>ID</th>
              <th>SKU</th>
              <th>Tipo</th>
              <th>Sub Tipo</th>
              <th>Nombre</th>
              <th>Marca</th>
              <th>Unidad</th>
              <th>Ancho</th>
              <th>Largo</th>
              <th>Espesor</th>
              <th>Propiedades</th>
              <th>Props Extra</th>
              <th>Importado</th>
              <th>Min</th>
              <th>Max</th>
              <th>Acciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

</div>
{{-- @stop --}}
@endsection

{{-- @section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
 --}}
@section('scripts')
{{-- @section('js') --}}
<script type="text/javascript">
  $(function () {
    $('#productos-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('productos.data') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'sku', name: 'sku', title: 'SKU'},
      {data: 'tipo.nombre', name: 'tipo.nombre', title: 'Tipo'},
      {data: 'subtipo.nombre', name: 'subtipo.nombre', title: 'Sub Tipo'},
      {data: 'nombre', name: 'nombre', title: 'Nombre'},
      {data: 'marca.nombre', name: 'marca.nombre', title: 'Marca'},
      {data: 'unidad.acronimo', name: 'unidad.acronimo', title: 'Unidad'},
      {data: 'ancho', name: 'ancho', title: 'Ancho', className: 'text-center'},
      {data: 'largo', name: 'largo', title: 'Largo', className: 'text-center'},
      {data: 'espesor', name: 'espesor', title: 'Espesor', className: 'text-center'},
      {data: 'propiedad_id', name: 'propiedad_id', title: 'Propiedad'},
      {data: 'extra.propiedad', name: 'extra.propiedad', title: 'Prop. Extra'},
      {data: 'importado', name: 'importado', title: 'Importado'},
      {data: 'minimo', name: 'minimo', title: 'min'},
      {data: 'maximo', name: 'maximo', title: 'max'},
      {data: 'action', name: 'action', title: 'Acciones', orderable: false, searchable: false}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection
{{-- @stop --}}