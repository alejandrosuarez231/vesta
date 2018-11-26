@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <h4>Brazos de Apertura</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <table class="table table-bordered">
        <caption>Brapes</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>Tipo</th>
            <th>Acronimo</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($brapes as $element)
          <tr>
            <td>{{ $element->id }}</td>
            <td>{{ $element->tipo }}</td>
            <td>{{ $element->acronimo }}</td>
            <td>
              <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection