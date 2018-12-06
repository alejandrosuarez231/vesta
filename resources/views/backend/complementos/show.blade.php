@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Complementos {{ $complementos->first()->modulo->sku_grupo }}</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <table class="table table-inverse table-striped">
        <thead>
          <tr>
            <th>Categoria</th>
            <th class="text-right">Cantidad</th>
            <th>Creado por</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($complementos as $element)
          <tr>
            <td>{{ $element->categoria->nombre }}</td>
            <td class="text-right">{{ $element->cantidad }}</td>
            <td>{{ $element->creado->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection