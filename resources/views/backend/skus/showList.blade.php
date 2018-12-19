@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <h4>SKU Padre: {{ $skus->first()->sku_padre }}</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ URL::previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center mb-4">
    <div class="col-md">
      <div class="card p-2">
        <div class="card-block">
          <h4 class="card-title">{{ $skus->first()->sku_padre }}</h4>
          <table class="table table-inverse">
            <caption>{{ $skus->first()->sku_padre }}</caption>
            <thead>
              <tr>
                <th>Id</th>
                <th>SKU Grupo</th>
                <th>SKU Padre</th>
                <th>Tipo</th>
                <th>Subtipo</th>
                <th>Categoria</th>
                <th>Sist./Apertura</th>
                <th>Tipos/Fondo</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($skus as $element)
              <tr>
                <td>{{ $element->id }}</td>
                <td>{{ $element->sku_grupo }}</td>
                <td>{{ $element->sku_padre }}</td>
                <td>{{ $element->tipo->nombre }}</td>
                <td>{{ $element->subtipo->nombre }}</td>
                <td>{{ $element->categoria->nombre }}</td>
                <td>{{ $element->sap->valor }}</td>
                <td>{{ $element->fondo->valor }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card p-2">
        <div class="card-block">
          <h4 class="card-title">Piezas</h4>
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th>Pieza</th>
                <th>Material</th>
                <th>Despcripcion</th>
                <th class="text-center">Largo</th>
                <th class="text-center"><small>L <sup>SUP</sup></small></th>
                <th class="text-center"><small>L <sup>INF</sup></small></th>
                <th class="text-center">Ancho</th>
                <th class="text-center"><small>A <sup>IZQ</sup></small></th>
                <th class="text-center"><small>A <sup>DER</sup></small></th>
                <th class="text-center">Mec 1</th>
                <th class="text-center">Mec 2</th>
                <th>Cant</th>
              </tr>
            </thead>
            <tbody>
              {{-- {{ dd( $skus->first()->piezas->where('skulistado_id',$skus->first()->id) ) }} --}}
              @foreach ( $skus->first()->piezas->where('skulistado_id',$skus->first()->id) as $element )
              <tr>
                <td>{{ $element->pieza->tipo_pieza }}</td>
                <td>{{ $element->materiale->nombre }}</td>
                <td>{{ $element->descripcion }}</td>
                <td class="text-center">{{ $element->largo }}</td>
                <td class="text-center">{{ $element->largo_sup }}</td>
                <td class="text-center">{{ $element->largo_inf }}</td>
                <td class="text-center">{{ $element->ancho }}</td>
                <td class="text-center">{{ $element->ancho_izq }}</td>
                <td class="text-center">{{ $element->ancho_der }}</td>
                <td class="text-center">{{ $element->mecanizado1 }}</td>
                <td class="text-center">{{ $element->mecanizado2 }}</td>
                <td class="text-right">{{ $element->cantidad }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card p-2">
        <div class="card-block">
          <h4 class="card-title">Complementos</h4>
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($skus->first()->complementos->where('skulistado_id',$skus->first()->id) as $element)
              <tr>
                <td>{{ $element->categoria->nombre }}</td>
                <td>{{ $element->descripcion }}</td>
                <td>{{ $element->cantidad }}</td>
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