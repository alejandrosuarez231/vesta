@extends('layouts.app')
{{-- @extends('adminlte::page') --}}

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md">
      <h4>Tipos</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/dashboard') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('tipos.create') }}" class="nav-link">Nueva</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md">
      <div class="table-responsive">
        <table class="table" id="tipos-table" data-page-length="100">
          <caption>Tipos</caption>
          <thead>
            <tr>
              <th>Id</th>
              <th>Tipologia</th>
              <th>Acromtip</th>
              <th>Padre</th>
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
{{-- @stop --}}
@endsection

{{-- @section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('scripts')
{{-- @section('js') --}}
<script type="text/javascript">
  $(function () {
    $('#tipos-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.tipos') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'tipologia', name: 'tipologia', title: 'Tipologia'},
      {data: 'acromtip', name: 'acromtip', title: 'Acron/Tip', className: 'text-center'},
      {data: 'padre', name: 'padre', title: 'Padre', className: 'text-center'},
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