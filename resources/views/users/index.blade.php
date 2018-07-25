@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md">
      <table id="users-table" class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Creado</th>
            <th>Actualizado</th>
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
    $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('users.data') !!}',
      columns: [
      {data: 'id', name: 'id'},
      {data: 'name', name: 'NOmbre'},
      {data: 'email', name: 'Email'},
      {data: 'created_at', name: 'Creado'},
      {data: 'updated_at', name: 'Actualizado'},
      {data: 'action', name: 'action', orderable: false, searchable: false}
      ],
      "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
    });
  });
</script>
@endsection
