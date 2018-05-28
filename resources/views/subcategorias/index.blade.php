@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Sub-Categorias</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('subcategorias.create') }}" class="nav-link">Nueva</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Sub-Categorias</caption>
          <thead>
            <tr>
              <th>Categoria</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($subcategorias as $element)
            <tr>
              <td>{{ $element->categoria->nombre }}</td>
              <td>{{ $element->nombre }}</td>
              <td>{{ $element->descripcion }}</td>
              <td class="text-center">
                <a href="{{ route('subcategorias.edit',['id'=>$element->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $subcategorias->links() }}
      </div>
    </div>
  </div>
</div>
@endsection