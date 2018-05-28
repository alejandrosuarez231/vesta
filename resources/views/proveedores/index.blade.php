@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Proveedores</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('proveedores.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Proveedores</caption>
          <thead>
            <tr>
              <th>RUC</th>
              <th>Nombre</th>
              <th>Telefonos</th>
              <th>Email</th>
              <th>Credito</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($proveedores as $element)
            <tr>
              <td>{{ $element->fiscalid }}</td>
              <td>{{ $element->nombre }}</td>
              <td>
                {{ $element->telefonos }}
                <span class="float-right" data-toggle="tooltip" data-placement="top" title="{{ $element->direccion }}"><small><i class="fas fa-location-arrow"></i> Dirección</small></span>
              </td>
              <td>
                {{ $element->email }} <a href="#" class="float-right" data-toggle="tooltip" data-placement="top" title="{{ $element->website }}"><small><i class="fas fa-link"></i> URL</small></a>
              </td>
              <td>{{ $element->credito }}</td>
              <td class="text-center">
                <a href="{{ route('proveedores.show',['id'=>$element->id]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-search"></i> Ver</a>
                <a href="{{ route('proveedores.edit',['id'=>$element->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i> Editar</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $proveedores->links() }}
      </div>
    </div>
  </div>

</div>
@endsection