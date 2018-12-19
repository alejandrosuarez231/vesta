@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md">
      <h3>Categorias</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('categorias.create') }}" class="nav-link">Nueva</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md">
        <table class="table" id="categorias-table" data-page-length="100">
          <caption>Categorias</caption>
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
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
    $('#categorias-table').DataTable({
      "order": [[ 1, "asc"]],
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.categorias') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'nombre', name: 'nombre', title: 'Nombre'},
      {data: 'acronimo', name: 'acronimo', title: 'Acronimo', className: 'text-center'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
{{-- @stop --}}
@endsection