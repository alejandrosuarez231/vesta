@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 offset-md-1">
      <h3>Asignar Propiedades Extras</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 offset-md-1">
      <table class="table table-striped table-bordered">
        <caption>Prop Extras</caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>Propiedad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($extras as $element)
          <tr>
            <td>{{ $element->id }}</td>
            <td>{{ $element->propiedad }}</td>
            <td>
              <a class="btn btn-warning" href="#" title="Editar">Editar</a>
              <a class="btn btn-primary" href="{{ route('extras.asignar',['id'=>$element->id]) }}" title="Asignar">Asignar</a>
              <a class="btn btn-info" href="{{ route('extras.extras',['id'=>$element->id]) }}" title="Ver">Listado</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $extras->links() }}
    </div>
  </div>
</div>
@endsection