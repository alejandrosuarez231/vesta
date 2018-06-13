@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Inventario General</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md">
      <table class="table table-bordered table-striped">
        <caption>Inventario</caption>
        <thead>
          <tr>
            <th>FI</th>
            <th>Categoria</th>
            <th colspan="2">Producto/SKU</th>
            <th>Cantidad</th>
            <th>Costo</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($inventarios as $element)
          <tr>
            <td>{{ $element->fi }}</td>
            <td>{{ $element->producto->categoria->tipo }}</td>
            <td>{{ $element->producto->nombre }}</td>
            <td><small>{{ $element->producto->sku }}</small></td>
            <td>{{ $element->cantidad }}</td>
            <td>{{ $element->precio }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endsection