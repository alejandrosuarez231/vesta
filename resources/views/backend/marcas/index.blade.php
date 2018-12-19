@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md">
      <h3>Marcas</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('marcas.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md">
        <table class="table" id="marcas-table" data-page-length="100">
          <caption>Marcas</caption>
          <thead>
            <tr>
              <th>Id</th>
              <th>Marca</th>
              <th>Importada</th>
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
    $('#marcas-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.marcas') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'nombre', name: 'nombre', title: 'Marcas'},
      {data: 'importada', name: 'importada', title: 'Importada', className: 'text-center'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection