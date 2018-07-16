@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Tipos</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('tipos.create') }}" class="nav-link">Nueva</a>
        </li>
      </ul>
      <div class="alert alert-info col-md-4">
        <small><span class="font-weight-bold text-danger">*</span> <span class="font-weight-bold">Tipologia Padre (Contiene Sub-Tipos)</span></small>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Tipos</caption>
          <thead>
            <tr>
              <th>Tipologia</th>
              <th>Nombre</th>
              <th>Acronimo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tipos as $element)
            <tr>
              <td>
                {{ $element->tipologia }} <sup class="text-primary text-uppercase">{{ $element->acromtip }} @if($element->padre > 0) <strong class="text-danger font-weight-bold">*</strong> @endif</sup>
              </td>
              <td>{{ $element->nombre }}</td>
              <td class="text-uppercase">{{ $element->acronimo }}</td>
              <td class="text-center">
                <a href="{{ route('tipos.edit',['id'=>$element->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $tipos->links() }}
      </div>
    </div>
  </div>

</div>
@endsection