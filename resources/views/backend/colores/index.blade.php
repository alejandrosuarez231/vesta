@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md">
      <h3>Colores</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('colores.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md">
        <table class="table" id="colores-table"  data-page-length="100">
          <caption>Colores</caption>
          <thead>
            <tr>
              <th>Id</th>
              <th>Color</th>
              <th>Acronimo</th>
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
    $('#colores-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.colores') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'nombre', name: 'nombre', title: 'Color'},
      {data: 'acronimo', name: 'acronimo', title: 'Acronimo'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection