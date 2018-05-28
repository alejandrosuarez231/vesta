@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Listado de Codigos</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('codigos.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Listado de codigos</caption>
          <thead>
            <tr>
              <th>Tipo</th>
              <th>Categoria</th>
              <th>Sub-Categoria</th>
              <th>Acronimo</th>
              <th>Tipologia</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($codigos as $element)
            <tr>
              <td>{{ $element->tipo }}</td>
              <td>{{ $element->categoria->nombre }}</td>
              <td>{{ @$element->subcategoria->nombre }}</td>
              <td>{{ $element->acronimo }}</td>
              <td>{{ $element->tipologia }}</td>
              <td>
                <a class="btn btn-sm btn-warning" href="{{ route('codigos.edit',['id'=>$element->id]) }}" title="Editar">Editar</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection