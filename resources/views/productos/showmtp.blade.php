@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md offset-md-1">
      <h3>Propiedades y Propiedad Extra</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">

    <div class="col-md-4">
      <div class="card" style="width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $producto->nombre }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $producto->descripcion }}</h6>
          <p class="card-text">
            Largo: <span class="text-uppercase">{{ $producto->largo }}</span><br>
            Ancho: <span class="text-uppercase">{{ $producto->ancho }}</span><br>
            espesor: <span class="text-uppercase">{{ $producto->espesor }}</span>
          </p>
        </div>
      </div>
    </div>
    @if ($producto->tipo->tipologia == 'PTO')
    <div class="col-md-4">
      <div class="card" style="width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">Materia Prima</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $producto->descripcion }}</h6>
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
    @endif
    @if ($producto->tipo->tipologia == 'MTP')
    <div class="col-md-4">
      <div class="card" style="width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">Propiedad Extra</h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <table class="table">
            <tbody>
              <tr>
                <td class="lead font-weight-bold">{{ @$producto->extra->propiedad }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endif
    <div class="col-md-4">&nbsp;</div>
  </div>

  @if ($producto->tipo->tipologia == 'PTO')
  <div class="row mt-2">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Materiales</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $producto->descripcion }}</h6>
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
  @endif
</div>
@endsection