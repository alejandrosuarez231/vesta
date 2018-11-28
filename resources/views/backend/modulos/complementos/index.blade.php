@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Modulos/Complemento</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('complementos.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <table class="table" id="moduloscomplementos-table"  data-page-length="100">
        <caption>Modulos/Complementos</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Costo</th>
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
    $('#moduloscomplementos-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.moduloscomplementos') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'nombre', name: 'nombre', title: 'Nombre'},
      {data: 'costo', name: 'costo', title: 'costo', className: 'text-right'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-left'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection