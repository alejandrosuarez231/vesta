@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>
        Modulo <strong>{{ $modulo->nombre }}</strong>
        @isset ($modulo->aprobado))
        <small><span class="float-right ml-1">
          Creado por: {{ $modulo->creado->name }} <br>
          Aprobado por: {{ $modulo->aprobado->name }}
        </span></small>
        @endisset
      </h3>
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
        <div class="card-block p-2">
          <h4 class="card-title">SKU Grupo <strong class="text-primary">{{ $modulo->sku_grupo }}</strong></h4>
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
                Espesor Permitido: <strong>{{ $modulo->espesor_caja_permitido }}</strong><br>
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
              <h4 class="card-title text-primary">Ancho</h4>
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
              <h4 class="card-title text-primary">Alto</h4>
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
              <h4 class="card-title text-primary">Profundidad</h4>
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
  <div class="row mt-2">
    @if ($piezas->count() > 0)
    <div class="col-md-6">
      <div class="card p-2">
        <div class="card-block">
          <h4 class="card-title text-primary">Piezas</h4>
          @foreach ($piezas as $element)
          <div class="row">
            <div class="col-md">
              <p>
                <span>Descripcion: <strong>{{ $element->descripcion }}</strong></span><br>
              </p>
              <p>
                <span>Tipo/Pieza: <strong>{{ $element->pieza_modulo->tipo_pieza }}</strong></span><br>
                <span>Material: <strong>{{ $element->materiale->nombre }}</strong></span><br>
                <span>Mecanizado1: <strong>{{ $element->mecanizado1 }}</strong></span><br>
                <span>Mecanizado2: <strong>{{ $element->mecanizado2 }}</strong></span><br>
              </p>
            </div>
            <div class="col-md">
              <p>
                <span>Largo: <strong>{{ $element->largo }}</strong></span><br>
                <span>Largo Sup: <strong>{{ $element->largo_sup }}</strong></span><br>
                <span>Largo Inf: <strong>{{ $element->largo_inf }}</strong></span><br>
              </p>
            </div>
            <div class="col-md">
              <p>
                <span>Ancho: <strong>{{ $element->ancho }}</strong></span><br>
                <span>Ancho Sup: <strong>{{ $element->ancho_sup }}</strong></span><br>
                <span>Ancho Inf: <strong>{{ $element->ancho_inf }}</strong></span><br>
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @else
    <div class="col-md-6">
      <h4 class="text-danger"><i class="fas fa-exclamation-triangle"></i> No se ha definido Piezas</h4>
    </div>
    @endif

    @if (count($complementos) > 0)
    <div class="col-md-6">
      <div class="card p-2">
        <div class="card-block">
          <h4 class="card-title text-primary">Componentes </h4>
          @foreach ($complementos as $element)
          <div class="row">
            <div class="col-md">
              <p><span>Categoria: <strong>{{ $element['nombre'] }}</strong></span></p>
            </div>
            <div class="col-md">
              <p><span>Cantidad: <strong>{{ $element['cantidad'] }}</strong></span></p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @else
    <div class="col-md-6">
      <h4 class="text-danger"><i class="fas fa-exclamation-triangle"></i> No se ha definido Complementos</h4>
    </div>
    @endif
  </div>
</div>
@endsection

