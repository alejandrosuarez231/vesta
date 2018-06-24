@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 offset-md-1">
      <h3>Marcas</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('marcas.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
      <table class="table">
        <caption>Marcas</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Marca</th>
            <th>Importada</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($marcas as $element)
          <tr>
            <td>{{ $element->id }}</td>
            <td class="text-capitalize">{{ $element->nombre }}</td>
            <td class="text-center">
              @if ($element->importada == 0)
                <span>No</span>
              @else
                <span>Si</span>
              @endif
            </td>
            <td>
              <a href="{{ route('marcas.edit',['id'=>$element->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $marcas->links() }}
    </div>
  </div>
</div>
@endsection