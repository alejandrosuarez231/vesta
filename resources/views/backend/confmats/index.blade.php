@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Asignacion de Mtp a Materiales</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ url("/backend/confmats/create") }}" class="nav-link">Nueva</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <table class="table" id="confparts-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Material</th>
            <th>Producto</th>
            <th>Accion</th>
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
    $('#confparts-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('data.confmats') !!}',
      columns: [
      {data: 'id', name: 'id', title: 'Id'},
      {data: 'materiale.nombre', name: 'materiale.nombre', title: 'Material'},
      {data: 'productos', name: 'productos', title: 'Productos'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection