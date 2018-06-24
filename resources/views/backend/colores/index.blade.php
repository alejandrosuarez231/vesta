@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 offset-md-1">
      <h3>Colores</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('colores.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
      <table class="table">
        <caption>Colores</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Color</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($colores as $element)
          <tr>
            <td>{{ $element->id }}</td>
            <td class="text-capitalize">{{ $element->nombre }}</td>
            <td>
              <a href="{{ route('colores.edit',['id'=>$element->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $colores->links() }}
    </div>
  </div>
</div>
@endsection