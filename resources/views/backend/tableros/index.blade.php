@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-md">
      <h4>Tableros</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('tableros.create') }}" class="nav-link">Nueva</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <table class="table table-inverse">
        <thead>
          <tr>
            <th>Categoria</th>
            <th>Color</th>
            <th class="text-center">4</th>
            <th class="text-center">15</th>
            <th class="text-center">16</th>
            <th class="text-center">18</th>
            <th class="text-center">19</th>
            <th class="text-center">25</th>
          </tr>
        </thead>
        {{-- {{ dd($tableros) }} --}}
        <tbody>
          @foreach ($tableros as $element)
          <tr>
            <td>{{ @$element->categoria->nombre }}</td>
            <td>{{ $element->colore->nombre }}</td>
            <td class="text-right">{{ $element->C4 }}</td>
            <td class="text-right">{{ $element->C15 }}</td>
            <td class="text-right">{{ $element->C16 }}</td>
            <td class="text-right">{{ $element->C18 }}</td>
            <td class="text-right">{{ $element->C19 }}</td>
            <td class="text-right">{{ $element->C25 }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection