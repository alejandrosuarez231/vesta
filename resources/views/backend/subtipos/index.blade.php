@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Sub-Tipos</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('subtipos.create') }}" class="nav-link">Nueva</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Sub-Tipos</caption>
          <thead>
            <tr>
              <th>Sub-Tipo</th>
              <th>Nombre</th>
              <th>Acronimo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($subtipos->sortBy('tipo_id') as $element)
            <tr>
              <td>{{ @$element->tipo->nombre }} <sup class="text-primary text-uppercase">{{ @$element->tipo->acromtip.$element->tipo->acronimo }}</sup></td>
              <td>{{ $element->nombre }}</td>
              <td>{{ $element->acronimo }}</td>
              <td class="text-center">
                <a href="{{ route('subtipos.edit',['id'=>$element->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $subtipos->links() }}
      </div>
    </div>
  </div>
</div>
@endsection