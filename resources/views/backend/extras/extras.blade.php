@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 offset-md-1">
      <h3>Propiedades Extras <span class="text-primary font-weight-bold">{{ $propsextra->first()->extra->propiedad }}</span></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link" title="">Regresar</a>
        </li>
      </ul>
      <table class="table">
        <caption>Propiedad</caption>
        <thead>
          <tr>
            <th>Tipo</th>
            <th>Subtipo</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($propsextra as $element)
          <tr>
            <td>{{ $element->tipo->nombre }}</td>
            <td>{{ $element->subtipo->nombre }}</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection