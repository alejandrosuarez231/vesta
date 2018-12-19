@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md">
      <h4>Listado SKU's</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Nueva</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md">
      <div class="">
        <table class="table" id="skus-table" data-page-length="100">
          <caption>SKU's</caption>
          <thead>
            <tr>
              <th>Id</th>
              <th>SKU/Grupo</th>
              <th>SKU/Padre</th>
              <th>Tipo</th>
              <th>Subtipo</th>
              <th>Categoria</th>
              <th>SAP</th>
              <th>Fondo</th>
              <th>Activo</th>
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
{{-- @section('js') --}}
<script type="text/javascript">
  $(function () {
    $('#skus-table').DataTable({
      "order": [[ 1, "asc" ]],
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.skuslist') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'sku_grupo', name: 'sku_grupo', title: 'SKU/Grupo'},
      {data: 'sku_padre', name: 'sku_padre', title: 'SKU/Padre'},
      {data: 'tipo.nombre', name: 'tipo.nombre', title: 'Tipo', className: 'text-left'},
      {data: 'subtipo.nombre', name: 'subtipo.nombre', title: 'Subtipo', className: 'text-left'},
      {data: 'categoria.nombre', name: 'categoria.nombre', title: 'Categoria', className: 'text-left'},
      {data: 'sap.valor', name: 'sap.valor', title: 'SAP', className: 'text-left'},
      {data: 'fondo.valor', name: 'fondo.valor', title: 'Fondo', className: 'text-left'},
      {data: 'activo', name: 'activo', title: 'Activo', className: 'text-center'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection