@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md">
      <h3>Materiales | Descripciones</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('materiales.create') }}" class="nav-link">Nuevo Material</a>
        </li>
        <li class="nav-item">
          <a href="{{ url('backend/materiales/descripciones/create') }}" class="nav-link">Nueva Descripcion</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <table class="table" id="materiales-table"  data-page-length="50">
        <caption>Materiales</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Acciones</th>
          </tr>
        </thead>
      </table>
    </div>

    <div class="col-md-7 offset-md-1">
      <table class="table" id="descripciones-table"  data-page-length="50">
        <caption>Descripciones</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>Tipos</th>
            <th>SubTipos</th>
            <th>SKU</th>
            <th>Material</th>
            <th>Descripcion</th>
            <th>Acciones</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
@endsection

@section('scripts')
{{-- @section('js') --}}
<script type="text/javascript">
  $(function () {
    $('#materiales-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.materiales') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'nombre', name: 'nombre', title: 'Color'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });

    $('#descripciones-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.descripciones') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'tipos', name: 'tipos', title: 'Tipos'},
      {data: 'subtipos', name: 'subtipos', title: 'Subtipos'},
      {data: 'sku', name: 'sku', title: 'SKU', className: 'text-center'},
      {data: 'materiale.nombre', name: 'materiale.nombre', title: 'Material'},
      {data: 'descripcion', name: 'descripcion', title: 'Descripcion'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection