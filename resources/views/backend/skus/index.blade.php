@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <table class="table table-bordered">
        <caption>table title and/or explanatory text</caption>
        <thead>
          <tr>
            <th>Modulo id</th>
            <th>sku grupo</th>
            <th>sku padre</th>
            <th>tipo id</th>
            <th>subtipo id</th>
            <th>categoria id</th>
            <th>descripcion</th>
            <th>sap id</th>
            <th>fondo id</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($data as $element)
          <tr>
            <td>{{ $element['modulo_id'] }}</td>
            <td>{{ $element['sku_grupo'] }}</td>
            <td>{{ $element['sku_padre'] }}</td>
            <td>{{ $element['tipo_id'] }}</td>
            <td>{{ $element['subtipo_id'] }}</td>
            <td>{{ $element['categoria_id'] }}</td>
            <td>{{ $element['descripcion'] }}</td>
            <td>{{ $element['sap_id'] }}</td>
            <td>{{ $element['fondo_id'] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection