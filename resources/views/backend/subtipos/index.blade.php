@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md">
      <h4>Sub-Tipos</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('subtipos.create') }}" class="nav-link">Nueva</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md">
      <div class="table-responsive">
        <table class="table" id="subtipos-table" data-page-length="100">
          <caption>Sub-Tipos</caption>
          <thead>
            <tr>
              <th>Id</th>
              <th>Tipo</th>
              <th>Nombre</th>
              <th>Acronimo</th>
              <th>Ancho</th>
              <th>Largo</th>
              <th>Espesor</th>
              <th>Color</th>
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
    $('#subtipos-table').DataTable({
      "order": [[ 1, "asc" ]],
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.subtipos') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'tipo.nombre', name: 'tipo.nombre', title: 'Tipo'},
      {data: 'nombre', name: 'nombre', title: 'Nombre'},
      {data: 'acronimo', name: 'acronimo', title: 'Acronimo', className: 'text-center'},
      {data: 'ancho', name: 'ancho', title: 'Ancho', className: 'text-center'},
      {data: 'largo', name: 'largo', title: 'Largo', className: 'text-center'},
      {data: 'espesor', name: 'espesor', title: 'Espesor', className: 'text-center'},
      {data: 'color', name: 'color', title: 'Color', className: 'text-center'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection