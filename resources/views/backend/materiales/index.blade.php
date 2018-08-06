@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md offset-md-1">
      <h3>Materiales | Descripciones</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('materiales.create') }}" class="nav-link">Nuevo Material</a>
        </li>
        <li class="nav-item">
          <a href="{{ url('backend/materiales/descripciones/create') }}" class="nav-link">Nueva Descripcion</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 offset-md-1">
      <table class="table">
        <caption>Materiales</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>SKU</th>
            <th>Nombre</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($materiales as $element)
          <tr>
            <td>{{ $element->id }}</td>
            <td>{{ $element->sku }}</td>
            <td>{{ $element->nombre }}</td>
            <td></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-5">
      <table class="table">
        <caption>Descripciones</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Material</th>
            <th>Descripcion</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($descripciones as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->materiale->nombre }}</td>
            <td>{{ $item->descripcion }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection