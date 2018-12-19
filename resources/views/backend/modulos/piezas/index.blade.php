@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Modulos/Piezas <small>Base Desarrollo</small></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('piezas.create') }}" class="nav-link">Nuevo</a>
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
            <th>F/Largo</th>
            <th>F/Ancho</th>
            <th>F/Canto</th>
            <th>CL1</th>
            <th>CL2</th>
            <th>CA1</th>
            <th>CA2</th>
            <th>Creado por</th>
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
      {data: 'formula_largo', name: 'formula_largo', title: 'F/Largo', className: 'text-left'},
      {data: 'formula_ancho', name: 'formula_ancho', title: 'F/Ancho', className: 'text-left'},
      {data: 'formula_canto', name: 'formula_canto', title: 'F/Ancho', className: 'text-left'},
      {data: 'canto_largo1', name: 'canto_largo1', title: 'CL1', className: 'text-left'},
      {data: 'canto_largo2', name: 'canto_largo2', title: 'CL2', className: 'text-left'},
      {data: 'canto_ancho1', name: 'canto_ancho1', title: 'CA1', className: 'text-left'},
      {data: 'canto_ancho2', name: 'canto_ancho2', title: 'CA2', className: 'text-left'},
      {data: 'created_by', name: 'created_by', title: 'Creado por', className: 'text-left'},
      {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-left'}
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
    });
  });
</script>
@endsection