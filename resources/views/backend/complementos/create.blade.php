@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app" v-cloak>
  <div class="row">
    <div class="col-md">
      <h3>Modulo: [<span class="text-primary"><strong>{{ $modulo->sku_grupo }}</strong></span>]  {{ $modulo->nombre }} <br><small>Nuevo Complemento </small></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  {!! Form::open(['route' => 'complementosku.complementos.store', 'method' => 'POST']) !!}
  <div class="row">
    <div class="col-md-6" @keyup.ctrl.alt.97="addRowComplemento(this.app.complementos.length -1)">
      <table class="table">
        <caption>
          <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
          <a class="btn btn-warning text-danger" href="{{ url('/frontend/proyectos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
        </caption>
        <thead>
          <tr>
            <th>Categoria</th>
            <th>Cantidad</th>
            <th>
              <a class="btn btn-link" alt="Ctrl+Alt+PAD1" title="Ctrl+Alt+PAD1" href="#" title="Agregar | Cntrl+Alt+1" @click="addRowComplemento(this.app.complementos.length -1)"><i class="fas fa-plus fa-xs"></i></a>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr  v-for="(complemento, index) in complementos" track-by="index">
            <td>
              {!! Form::hidden('modulo_id[]', null, ['v-model' => 'complemento.modulo_id']) !!}
              {!! Form::select('categoria_id[]', \App\Categoria::whereIn('subtipo_id',[10,7,4,14,5,3,8,11,2,9])->orderBy('nombre')->pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Selección','v-model' => 'complemento.categoria_id']) !!}
            </td>
            <td>
              {!! Form::number('cantidad[]', null, ['class'=>'form-control text-right','placeholder'=>'0','step'=>1, 'min'=>1, 'v-model' => 'complemento.cantidad']) !!}
            </td>
            <td><a class="btn btn-link text-danger align-middle" href="#" title="Eliminar" @click="removeRowComplemento(index)" v-if="complementos.length > 1"><i class="fas fa-minus fa-xs"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <div class="card p-2">
        <div class="card-block">
          <h4 class="card-title">Piezas </h4>
          <div class="row">
            <div class="col-md">

            </div>
          </div>
          <div class="row">
            <div class="col-md">
              @php
              {{ $var = 1; }}
              @endphp
              @if ($piezas_modulo)
              @foreach ($piezas_modulo as $element)
              <p>
                <span>{{ $var++ }}</span> &nbsp; &nbsp;
                <span>Tipo/Pieza: <strong>{{ $element->pieza_modulo->tipo_pieza }}</strong></span> &nbsp; &nbsp;
                <span>Material: <strong>{{ $element->materiale->nombre }}</strong></span><br>
              </p>
              @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script>
  var app = new Vue({
    el: '#app',

    data: {
      complementos: [{modulo_id: '{{ $modulo->id }}', producto: '', categoria_id: '', cantidad: 0}],
    },

    methods: {
      addRowComplemento: function (index) {
        this.complementos.splice(index + 1, 1, {modulo_id: '{{ $modulo->id }}', producto: null, categoria_id: null, cantidad: 0});
      },
      removeRowComplemento: function(index){
        // console.log(index);
        if( this.complementos.length > 1){
          this.complementos.splice(index, 1);
        }
      },
    }


  });
</script>
@endsection

