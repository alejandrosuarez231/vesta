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
        @if (\App\Skulistado::count() == 0)
        <li class="nav-item">
          <a href="{{ action('SkuController@makeSkuPadreLote') }}" class="nav-link">Generar Listado de SKU's</a>
        </li>
        @endif
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <table class="table table-hover" id="modulos-table"  data-page-length="50">
        <caption>Lista de Modulos</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>sku_grupo</th>
            <th>Tipo</th>
            <th>Subtipo</th>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Acciones/P&C</th>
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
      ajax: '{!! route('data.modulos') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'sku_grupo', name: 'sku_grupo', title: 'sku_grupo'},
      {data: 'tipo.nombre', name: 'tipo.nombre', title: 'Tipo', className: 'text-center'},
      {data: 'subtipo.nombre', name: 'subtipo.nombre', title: 'SubTipo', className: 'text-center'},
      {data: 'categoria.nombre', name: 'categoria.nombre', title: 'Categoria', className: 'text-left'},
      {data: 'nombre', name: 'nombre', title: 'Nombre', className: 'text-left'},
      {data: 'other', name: 'other', title: 'Acciones/P&C', orderable: false, searchable: false, className: 'text-center'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection