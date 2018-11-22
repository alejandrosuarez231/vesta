@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Modulo <strong>{{ $modulo->nombre }}</strong> </h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/backend/modulos') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <div class="card p-2">
        <p>SKU Grupo <strong>{{ $modulo->nombre }}</strong></p>
        <div class="card-block p-2">
          <h4 class="card-title">{{ $modulo->sku_grupo }}</h4>
          <p class="card-text">
            <div class="row">
              <div class="col-md-5">
                Tipo: <strong>{{ $modulo->tipo->nombre }}</strong><br>
                SubTipo: <strong>{{ $modulo->subtipo->nombre }}</strong><br>
                Categoria: <strong>{{ $modulo->categoria->nombre }}</strong><br>
                Descripción: <strong>{{ $modulo->descripcion }}</strong><br>
              </div>
              <div class="col">
                Consecutivo: <strong>{{ $modulo->consecutivo }}</strong><br>
                Cant. Variantes: <strong>{{ $modulo->variantes }}</strong><br>
                Sist. Apertura: <strong>{{ $saps->implode('valor',', ') }}</strong><br>
                Tipos / Fondo: <strong>{{ $fondos->implode('valor',', ') }}</strong><br>
                Espesor Permitido: <strong>{{ $modulo->espesor_permitido }}</strong><br>
              </div>
            </div>
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <div class="card-deck-wrapper">
        <div class="card-deck">
          <div class="card">
            <div class="card-block p-2">
              <h4 class="card-title">Ancho</h4>
              <p class="card-text p-2">
                <span class="lead">Ancho Minimo: {{ $modulo->ancho_minimo }}</span> <br>
                <span class="lead">Ancho Maximo: {{ $modulo->ancho_maximo }}</span> <br>
                <span class="lead">Ancho Var: {{ $modulo->ancho_var }}</span> <br>
              </p>
              <p class="card-text p-2"><small class="text-muted">{{ $modulo->sku_grupo }}</small></p>
            </div>
          </div>
          <div class="card">
            <div class="card-block p-2">
              <h4 class="card-title">Alto</h4>
              <p class="card-text p-2">
                <span class="lead">Alto Minimo: {{ $modulo->alto_minimo }}</span> <br>
                <span class="lead">Alto Maximo: {{ $modulo->alto_maximo }}</span> <br>
                <span class="lead">Alto Var: {{ $modulo->alto_var }}</span> <br>
              </p>
              <p class="card-text"><small class="text-muted">{{ $modulo->sku_grupo }}</small></p>
            </div>
          </div>
          <div class="card">
            <div class="card-block p-2">
              <h4 class="card-title">Profundidad</h4>
              <p class="card-text p-2">
                <span class="lead">Profundidad Minima: {{ $modulo->profundidad_minima }}</span> <br>
                <span class="lead">Profundidad Maxima: {{ $modulo->profundidad_maxima }}</span> <br>
                <span class="lead">Profundidad Var: {{ $modulo->profundidad_var }}</span> <br>
              </p>
              <p class="card-text"><small class="text-muted">{{ $modulo->sku_grupo }}</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

