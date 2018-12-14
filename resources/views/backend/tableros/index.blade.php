@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-md">
      <h4>Tableros</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('tableros.create') }}" class="nav-link">Nueva</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <table class="table table-inverse">
        <thead>
          <tr>
            <th>Categoria</th>
            <th>Color</th>
            <th class="text-center">Espesor</th>
            <th class="text-center">Costo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        {{-- {{ dd($tableros) }} --}}
        <tbody>
          @foreach ($tableros as $element)
          <tr>
            <td>{{ @$element->categoria->nombre }}</td>
            <td>{{ $element->colore->nombre }}</td>
            <td class="text-right">{{ $element->espesor }}</td>
            <td class="text-right">{{ $element->costo }}</td>
            <td class="text-right"></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection