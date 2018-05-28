@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Productos </h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('productos.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>

  @if (isset($productos) && $productos->count() > 0)
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Materia Prima</caption>
          <thead>
            <tr>
              <th>SKU</th>
              <th>Categoria</th>
              <th>Sub Categoria</th>
              <th>Tipo</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Unidad</th>
              <th>Proveedor</th>
              <th>Largo</th>
              <th>Ancho</th>
              <th>Área</th>
              <th>Espesor</th>
              <th>Importado</th>
              <th>Min</th>
              <th>Max</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($mtps as $element)
            <tr>
              <td>{{ $element->sku }}</td>
              <td>{{ $element->categoria->nombre }}</td>
              <td>{{ $element->subcategoria->nombre }}</td>
              <td>{{ $element->tipo }}</td>
              <td>{{ $element->nombre }}</td>
              <td>{{ $element->descripcion }}</td>
              <td>{{ $element->unidad->nombre }}</td>
              <td>{{ $element->proveedor->nombre }}</td>
              <td>{{ $element->largo }}</td>
              <td>{{ $element->ancho }}</td>
              <td>{{ $element->area }}</td>
              <td>{{ $element->espesor }}</td>
              <td>{{ $element->importado }}</td>
              <td>{{ $element->min }}</td>
              <td>{{ $element->max }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $productos->links() }}
      </div>
    </div>
  </div>
  @else
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="alert alert-primary" role="alert">
        Sin registros de Productos - Productos!
      </div>
    </div>
  </div>
  @endif

</div>
@endsection