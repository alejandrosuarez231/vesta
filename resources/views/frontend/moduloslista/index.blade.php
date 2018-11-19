@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Lista de Modulos</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('modulos.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <table class="table" id="modulos-table"  data-page-length="100">
        <caption>Lista de Modulos</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>SKU Grupo</th>
            <th>Tipo</th>
            <th>Subtipo</th>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Consecutivo</th>
            <th>Acciones</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
  $(function () {
    $('#modulos-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.moduloslista') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'sku_grupo', name: 'sku_grupo', title: 'SKU Grupo'},
      {data: 'tipo.nombre', name: 'tipo.nombre', title: 'Tipo', className: 'text-center'},
      {data: 'subtipo.nombre', name: 'subtipo.nombre', title: 'SubTipo', className: 'text-center'},
      {data: 'categoria.nombre', name: 'categoria.nombre', title: 'Categoria', className: 'text-left'},
      {data: 'nombre', name: 'nombre', title: 'Nombre', className: 'text-left'},
      {data: 'consecutivo', name: 'consecutivo', title: 'consecutivo', className: 'text-center'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-left'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection