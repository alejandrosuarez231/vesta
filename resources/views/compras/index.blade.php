@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Compras</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('compras.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <caption>Ordenes de Compra</caption>
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Orden</th>
            <th>Proveedor</th>
            <th>Prioridad</th>
            <th>Total</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($compras as $element)
          <tr>
            <td>{{ $element->fecha }}</td>
            <td>{{ $element->ordendecompra_id }}</td>
            <td>{{ $element->proveedore->nombre }}</td>
            <td>{{ $element->prioridad }}</td>
            <td class="text-right">
              @php
                $totalOrden = $element->compradetalle->map( function($item, $index) {
                  return $item->cantidad * $item->precio;
                });
              @endphp
              {{  number_format($totalOrden->sum(),2,",",".") }}
            </td>
            <td>
              <a class="btn btn-sm btn-primary mr-2" href="#" title="Ver">Ver</a>
              <a class="btn btn-sm btn-success mr-2" href="#" title="Cargar">Cargar</a>
              <a class="btn btn-sm btn-danger mr-2" href="#" title="Anular">Anular</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection