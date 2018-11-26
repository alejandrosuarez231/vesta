@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <h4>Lista de SKUs</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ URL::previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md">
      <table class="table table-bordered">
        <caption>table title and/or explanatory text</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>SKU Grupo</th>
            <th>SKU Padre</th>
            <th>Tipo</th>
            <th>Subtipo</th>
            <th>Categoria</th>
            <th>descripcion</th>
            <th>Sist./Apertura</th>
            <th>Tipos/Fondo</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($lista as $element)
          <tr>
            <td>{{ $element->id }}</td>
            <td>{{ $element->sku_grupo }}</td>
            <td>{{ $element->sku_padre }}</td>
            <td>{{ $element->tipo->nombre }}</td>
            <td>{{ $element->subtipo->nombre }}</td>
            <td>{{ $element->categoria->nombre }}</td>
            <td>{{ $element->descripcion }}</td>
            <td>{{ $element->sap->valor }}</td>
            <td>{{ $element->fondo->valor }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection