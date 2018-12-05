@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md">
      <h3>Complementos</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
</div>
@endsection