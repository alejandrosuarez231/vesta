@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md offset-md-1">
      <h3>Proyecto</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card" style="width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $proyecto->nombre }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $proyecto->descripcion }}</h6>
          <p class="card-text">
            Largo: <span class="text-uppercase">{{ $proyecto->largo }}</span><br>
            Ancho: <span class="text-uppercase">{{ $proyecto->ancho }}</span><br>
            Profundidad: <span class="text-uppercase">{{ $proyecto->profundidad }}</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">Complementos</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $proyecto->descripcion }}</h6>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Herraje</th>
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mtps as $element)
              <tr>
                <td>{{ $element->id  }}</td>
                <td>{{ $element->producto->nombre  }}</td>
                <td class="text-right">{{ $element->cantidad  }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">&nbsp;</div>
  </div>
  <div class="row mt-2">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Piezas</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $proyecto->descripcion }}</h6>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Material</th>
                <th>Descripcion</th>
                <th>Propiedades</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($materiales as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->material->nombre }}</td>
                <td>{{ $item->descripcion->descripcion }}</td>
                <td>
                  Largo: <span class="font-weight-bold">{{ $item->propiedad->largo }}</span>
                  Ancho: <span class="font-weight-bold">{{ $item->propiedad->ancho }}</span>
                  Espesor: <span class="font-weight-bold">{{ $item->propiedad->espesor }}</span>
                  Veta: <span class="font-weight-bold">{{ $item->propiedad->veta }}</span>
                  Largo IZQ: <span class="font-weight-bold">{{ $item->propiedad->largo_izq }}</span>
                  Largo DER: <span class="font-weight-bold">{{ $item->propiedad->largo_der }}</span>
                  Ancho SUP: <span class="font-weight-bold">{{ $item->propiedad->ancho_sup }}</span>
                  Ancho INF: <span class="font-weight-bold">{{ $item->propiedad->ancho_inf }}</span>
                  MEC1: <span class="font-weight-bold">{{ $item->propiedad->mec1 }}</span>
                  MEC2: <span class="font-weight-bold">{{ $item->propiedad->mec2 }}</span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection