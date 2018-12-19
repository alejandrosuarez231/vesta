@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 offset-md-1">
      <h4>Listado de Codigos / Base SKU</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/truncateCodigos') }}" class="nav-link">Recrear</a>
        </li>

      </ul>
      @if ($codigos->count() == 0)
      <div class="alert alert-info">
        No hay codigos definidos
      </div>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 offset-md-1">
      <table class="table">
        <caption>Base SKU</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Tipologia</th>
            <th>Sub-Tipo</th>
            <th>SKU-Base</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($codigos as $element)
          <tr>
            <td>{{ $element->id }}</td>
            <td>{{ $element->tipo->nombre }}</td>
            <td>{{ @$element->subtipo->nombre }}</td>
            <td>{{ $element->skubase }}</td>
            <td></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection