@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Proveedor</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/proveedores') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Datos del Proveedor</caption>
          <thead>
            <tr>
              <th>Fiscal ID</th>
              <th>Nombre</th>
              <th>Dirección</th>
              <th>Telefonos</th>
              <th>Email</th>
              <th>WebSite</th>
              <th>Credito</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $proveedore->fiscalid }}</td>
              <td>{{ $proveedore->nombre }}</td>
              <td>{{ $proveedore->direccion }}</td>
              <td>{{ $proveedore->telefonos }}</td>
              <td>{{ $proveedore->email }}</td>
              <td>{{ $proveedore->website }}</td>
              <td>{{ $proveedore->credito }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection