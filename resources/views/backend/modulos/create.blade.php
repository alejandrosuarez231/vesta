@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endsection

@section('content')
<div class="container-fluid" id="app" v-cloak>
  <div class="row">
    <div class="col-md">
      <h3>Modulos</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/backend/modulos') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      {!! Form::open(['route' => 'modulos.store', 'method' => 'POST']) !!}
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class' => 'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          <select name="tipos[]" class="form-control" multiple data-live-search="true" title="Asignar tipo" multiple="multiple" v-model="tipos" data-width="auto">
            <option v-for="(tipo, index) in tiposList" :value="tipo.value">@{{ tipo.label }}</option>
          </select>
        </div>
        <div class="form-group mr-2">
          <select name="subtipos[]" class="form-control" multiple title="Asignar subtipo" multiple="multiple" v-model="subtipos">
            <option v-for="(item, indice) in subtiposList" :value="item.value">@{{ item.label }}</option>
          </select>
        </div>
      </div>
      <div class="form-group mr-2">
        {!! Form::label('sar', 'Sist. de Armado', ['class' => 'form-control-label']) !!}
        {!! Form::select('sar[]', \App\Confpart::where('nombre','=','Sist. de Armado')->pluck('valor','id'), null, ['class' => 'form-control','required','multiple']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('numerologia', 'Numerologia', ['class' => 'form-control-label']) !!}
        {!! Form::number('numerologia', null, ['class' => 'form-control','required']) !!}
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/modulos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/i18n/defaults-es_ES.min.js"></script>
<script>
  $(document).ready(function(){
    $('.test').selectpicker();
  })
</script>
<script>
  var app = new Vue({
    el: '#app',

    created() {
      axios.get('/TiposPTO')
      .then( response => {
        this.tiposList = response.data
      })
      .catch( function(error) {
        console.log(error);
      })
    },

    data: {
      tipos: '',
      tiposList: '',
      subtipos: '',
      subtiposList: [],
    },

    watch: {
      tipos: function(){
        axios.get('/subtiposFiltro/' + this.tipos)
        .then( response => {
          this.subtiposList = response.data
          console.log(this.subtiposList);
        })
        .catch(function(error) {
          console.log(error)
        })
      }
    },

    methods: {
      getSubtipo: function(){
        if(this.tipo > 0){
          axios.get('/subtipos/' + this.tipo)
          .then( response => {
            this.subtipos = response.data;
          })
          .catch(function(error){
            console.log(error)
          })
        }
      }
    },
  })
</script>
@endsection