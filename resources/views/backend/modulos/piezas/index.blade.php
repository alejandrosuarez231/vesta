@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Modulos/Piezas</h3>
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
      <table class="table" id="modulospiezas-table"  data-page-length="100">
        <caption>Modulos/Piezas</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>Tipo/Pieza</th>
            <th>Material</th>
            <th>Acronimo</th>
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
    $('#modulospiezas-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.modulospiezas') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'tipo_pieza', name: 'tipo_pieza', title: 'Tipo/Pieza'},
      {data: 'materiale.nombre', name: 'materiale.nombre', title: 'Material', className: 'text-left'},
      {data: 'acronimo', name: 'acronimo', title: 'Acronimo', className: 'text-left'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-left'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection