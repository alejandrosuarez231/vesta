@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app" v-cloak>
  <div class="row">
    <div class="col-md">
      <h3>Modulo: [<span class="text-primary"><strong>{{ $modulo->sku_grupo }}</strong></span>]  {{ $modulo->nombre }} <br><small>Nueva Pieza </small></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  {!! Form::open(['route' => 'piezassku.piezas.store', 'method' => 'POST']) !!}
  <div class="row">
    <div class="col-md" @keyup.ctrl.alt.97="addRowPIEZA(this.app.piezas.length -1)">
      <table class="table">
        <caption>
          <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
          <a class="btn btn-warning text-danger" href="{{ url('/frontend/proyectos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
        </caption>
        <thead>
          <tr>
            <th title="Tipo de Pieza">Pieza/Tipo</th>
            <th title="Descripcion">Descripcion</th>
            <th title="Formula Area">Largo</th>
            <th title="Formula Canto">CL-1</th>
            <th title="Canto Largo 1">CL-2</th>
            <th title="Canto Largo 2">Ancho</th>
            <th title="Canto Ancho 1">CA-1</th>
            <th title="Canto Ancho 2">CA-2</th>
            <th title="Mecanizado1">Mecanizado1</th>
            <th title="Mecanizado2">Mecanizado2</th>
            <th title="Cantidad">Cantidad</th>
            <th title="Agregar Pieza">
              <a class="btn btn-link" alt="Ctrl+Alt+PAD1" title="Ctrl+Alt+PAD1" href="#" title="Agregar | Cntrl+Alt+1" @click="addRowPIEZA(this.app.piezas.length -1)"><i class="fas fa-plus fa-xs"></i></a>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(pieza, index) in piezas" track-by="index">
            <td>
              {!! Form::hidden('modulo_id[]', null, ['v-model'=>'pieza.modulo_id']) !!}
              {!! Form::select('piezas_modulo_id[]', \App\Pieza_modulo::pluck('tipo_pieza','id'), null, ['class'=>'form-control','v-model'=>'pieza.piezas_modulo_id','placeholder'=>'Selección','@change'=>'getInfo(index,piezas[index].piezas_modulo_id)','required']) !!}
              {!! Form::hidden('materiale_id[]', null, ['v-model'=>'pieza.materiale_id']) !!}
            </td>
            <td>{!! Form::text('descripcion[]', null, ['class'=>'form-control', 'v-model'=>'pieza.descripcion']) !!}</td>
            <td>{!! Form::text('largo[]', null, ['class'=>'form-control', 'v-model'=>'pieza.largo']) !!}</td>
            <td>{!! Form::text('largo_sup[]', null, ['class'=>'form-control', 'v-model'=>'pieza.largo_sup']) !!}</td>
            <td>{!! Form::number('largo_inf[]', null, ['class'=>'form-control', 'v-model'=>'pieza.largo_inf']) !!}</td>
            <td>{!! Form::text('ancho[]', null, ['class'=>'form-control', 'v-model'=>'pieza.ancho']) !!}</td>
            <td>{!! Form::number('ancho_izq[]', null, ['class'=>'form-control', 'v-model'=>'pieza.ancho_izq']) !!}</td>
            <td>{!! Form::number('ancho_der[]', null, ['class'=>'form-control', 'v-model'=>'pieza.ancho_der']) !!}</td>
            <td>{!! Form::number('mecanizado1[]', null, ['class' => 'form-control', 'v-model' => 'pieza.mecanizado1']) !!}</td>
            <td>{!! Form::number('mecanizado2[]', null, ['class' => 'form-control', 'v-model' => 'pieza.mecanizado2']) !!}</td>
            <td>{!! Form::number('cantidad[]', null, ['class'=>'form-control text-right', 'step' => 1, 'min' => 1, 'v-model'=>'pieza.cantidad','required']) !!}</td>
            <td><a class="btn btn-link text-danger align-middle" href="#" title="Eliminar" @click="removeRowPIEZA(index)" v-if="piezas.length > 1"><i class="fas fa-minus fa-xs"></i></a></td>
          </tr>
        </tbody>
      </table>

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
      sku_grupo: '{{ $modulo->sku_grupo }}',
      descripcion: '',
      piezas: [{modulo_id:'',piezas_modulo_id:'',materiale_id:'',descripcion:'',cantidad:'',largo:'',largo_sup:'',largo_inf:'',ancho:'',ancho_izq:'',ancho_der:'',mecanizado1:'',mecanizado2:''}],
    },

    methods: {
      addRowPIEZA: function (index) {
        this.piezas.splice(index + 1, 1, {
          piezas_modulo_id:null,materiale_id:null,descripcion:null,cantidad:0,largo:null,largo_sup:null,largo_inf:null,ancho:null,ancho_izq:null,ancho_der:null,mecanizado1:null,mecanizado2:null
        });
      },
      removeRowPIEZA: function(index){
        // console.log(index);
        if( this.piezas.length > 1){
          this.piezas.splice(index, 1);
        }
      },

      getInfo: function(index,id){
        axios.get('/getPiezaModulo/' + id)
        .then(response => {
          console.log(response.data);
          this.descripcion = response.data.acronimo + '-' + this.sku_grupo;
          this.piezas.splice(index, 1, {
            modulo_id:'{{ $modulo->id }}',
            piezas_modulo_id: response.data.id,
            materiale_id: response.data.materiale_id,
            descripcion: response.data.acronimo + '-' + this.sku_grupo,
            cantidad:'',
            largo: response.data.formula_area,
            largo_sup: '',
            largo_inf: '',
            ancho: response.data.formula_canto,
            ancho_izq: '',
            ancho_der: '',
            mecanizado1: '',
            mecanizado2: ''
          });
        })
        .catch(function(error){
          console.log(error)
        })
      },
    }


  });
</script>
@endsection