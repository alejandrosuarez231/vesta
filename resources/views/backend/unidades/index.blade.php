@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Unidades</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('unidades.create') }}" class="nav-link">Nueva</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Unidades</caption>
          <thead>
            <tr>
              <th>Acronimo</th>
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($unidades as $element)
            <tr>
              <td class="text-uppercase">{{ $element->acronimo }}</td>
              <td>{{ $element->nombre }}</td>
              <td class="text-center">
                <a href="{{ route('unidades.edit',['id'=>$element->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $unidades->links() }}
      </div>
    </div>
  </div>

</div>
@endsection