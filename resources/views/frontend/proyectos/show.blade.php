@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
  <div class="row">
    <div class="col-md">
      <h3>Proyecto <span class="font-weight-bold text-info">{{ $proyecto->nombres->nombre }}</span></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $proyecto->sku }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $proyecto->descripcion }}</h6>
          <p class="card-text">
            Largo: <span class="text-uppercase badge badge-success">{{ $proyecto->largo }}</span><br>
            Alto: <span class="text-uppercase badge badge-success">{{ $proyecto->alto }}</span><br>
            Profundidad: <span class="text-uppercase badge badge-success">{{ $proyecto->profundidad }}</span><br>
            Sist. de Apertura: <span class="text-uppercase badge badge-success">{{ @$proyecto->saps->valor }}</span><br>
            Sist. de Armado: <span class="text-uppercase badge badge-success">{{ @$proyecto->sars->valor }}</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
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
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Proyecto</h5>
          <h6 class="card-subtitle text-muted">Acciones</h6>
          <p>
            <a class="btn btn-sm btn-primary" href="#" title="Aprobar">Aprobar</a>
            <a class="btn btn-sm btn-danger" href="#" title="Descartar" @click="deleteProyecto">Descartar</a>
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
                                <th>Alto</th>
                                <th>Profundidad</th>
                                <th>Canto <small>IZQ</small></th>
                                <th>Canto <small>DER</small></th>
                                <th>Canto <small>SUP</small></th>
                                <th>Canto <small>INF</small></th>
                                <th>Mec 1</th>
                                <th>Mec 2</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-center">{{ $item->largo }}</td>
                                <td class="text-center">{{ $item->alto }}</td>
                                <td class="text-center">{{ $item->profundidad }}</td>
                                <td class="text-center">{{ $item->largo_izq }}</td>
                                <td class="text-center">{{ $item->largo_der }}</td>
                                <td class="text-center">{{ $item->alto_sup }}</td>
                                <td class="text-center">{{ $item->alto_inf }}</td>
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

@section('scripts')
<script>
  var app = new Vue({
    el: '#app',

    methods: {
      deleteProyecto: function(){
        swal({
          title: 'Esta Ud., seguro?',
          text: "Para revertir esta operación debera contactar con el Administrador del sistema!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Eliminalo!'
        }).then((result) => {
          if (result.value) {
            swal(
              'Borrado!',
              'Proyecto eliminado.',
              'success'
              )
          }
        })
      }
    }
  })
</script>
@endsection