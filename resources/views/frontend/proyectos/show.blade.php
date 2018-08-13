@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md offset-md-1">
      <h3>Proyecto <span class="font-weight-bold text-info">{{ $proyecto->nombre }}</span></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link">Regresar</a>
        </li>
      </ul>
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
            Espesor: <span class="text-uppercase">{{ $proyecto->espesor }}</span>
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
                <td>{{ $element->tipo->nombre }} / {{ $element->subtipo->nombre }}</td>
                <td class="text-right">{{ $element->cantidad  }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">Proyecto</h5>
          <h6 class="card-subtitle text-muted">Acciones</h6>
          <p>
            <a class="btn btn-sm btn-primary" href="#" title="Aprobar">Aprobar</a>
            <a class="btn btn-sm btn-danger" href="#" title="Aprobar">Negado</a>
          </p>
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
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($materiales as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->material->nombre }}</td>
                <td>{{ $item->descripcion->descripcion }}</td>
                <td>
                  {{-- Modal --}}
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#propiedades{{ $item->id }}">
                    Ver
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="propiedades{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="propiedadesLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="propiedadesLabel">{{ $item->descripcion->descripcion }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-sm table-bordered" style="font-size: 0.8em;">
                            <caption>Lista de propiedades de la pieza</caption>
                            <thead>
                              <tr>
                                <th>Largo</th>
                                <th>Ancho</th>
                                <th>Espesor</th>
                                <th>Largo IZQ <small>Canto</small></th>
                                <th>Largo DER <small>Canto</small></th>
                                <th>Ancho SUP <small>Canto</small></th>
                                <th>Ancho INF <small>Canto</small></th>
                                <th>Mec 1</th>
                                <th>Mec 2</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-center">{{ $item->largo }}</td>
                                <td class="text-center">{{ $item->ancho }}</td>
                                <td class="text-center">{{ $item->espesor }}</td>
                                <td class="text-center">{{ $item->largo_izq }}</td>
                                <td class="text-center">{{ $item->largo_der }}</td>
                                <td class="text-center">{{ $item->ancho_sup }}</td>
                                <td class="text-center">{{ $item->ancho_inf }}</td>
                                <td class="text-center">{{ $item->mec1 }}</td>
                                <td class="text-center">{{ $item->mec2 }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- modal --}}
                </td>
                <td class="text-right">{{ $item->cantidad }}</td>
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