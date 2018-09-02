@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Lista de Materiales </h4>
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

  <div class="row justify-content-center">
    <div class="col-md">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="proyectos-list">
          <caption>Listado de Proyectos</caption>
          <thead>
            <tr>
              <th>ID</th>
              <th>SKU</th>
              <th>SKU Comercial</th>
              <th>Tipo</th>
              <th>Sub Tipo</th>
              <th>Nombre</th>
              <th>Sist. de Apertura</th>
              <th>Siste. de Armado</th>
              <th>Acciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(function () {
    $('#proyectos-list').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.proyectos') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'sku', name: 'sku', title: 'SKU'},
      {data: 'codigo', name: 'codigo', title: 'SKU Comercial'},
      {data: 'tipo.nombre', name: 'tipo.nombre', title: 'Tipo'},
      {data: 'subtipo.nombre', name: 'subtipo.nombre', title: 'Subtipo'},
      {data: 'nombres.nombre', name: 'nombres.nombre', title: 'Nombre'},
      {data: 'saps.valor', name: 'saps.valor', title: 'Sist. de Apertura', className: 'text-center'},
      {data: 'sars.valor', name: 'sars.valor', title: 'Sist. de Armado', className: 'text-center'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection