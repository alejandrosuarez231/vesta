@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Modulos</h3>
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
        <caption>Modulos</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>Tipo</th>
            <th>Subtipo</th>
            <th>Nombre</th>
            <th title="Sist. de Apertura">SAR</th>
            <th>Numerologia</th>
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
      {data: 'tipos', name: 'tipos', title: 'Tipos'},
      {data: 'subtipos', name: 'subtipos', title: 'Subtipos'},
      {data: 'nombre', name: 'nombre', title: 'Nombre'},
      {data: 'sar', name: 'sar', title: 'SAR', className: 'text-center'},
      {data: 'numerologia', name: 'numerologia', title: 'SKU', className: 'text-center'},
      {data: 'action', name: 'action', title: 'Acciones', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection