@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endsection

@section('content')
<div class="container-fluid" id="app" v-cloak>
  <div class="row">
    <div class="col-md offset-md-1">
      <h3>Materiales</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ URL::previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
      {!! Form::open(['route' => 'materiales.store', 'method' => 'POST']) !!}
      <div class="form-group">
        {!! Form::label('sku', 'SKU', ['class'=>'form-control-label']) !!}
        {!! Form::text('sku', null, ['class' => 'form-control col-md-3','placeholder' =>'Codigo SKU','readonly', 'v-model' =>'sku']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class' => 'form-control col-md-3','placeholder' =>'Nombre', 'v-model' => 'nombre']) !!}
      </div>
      <span class="font-weight-bold text-muted"><small>Asignar - Filtros</small></span>
      <div class="row">
        <div class="col-md-2 form-group">
          <select name="tipos[]" class="test" multiple data-live-search="true" title="Asignar tipo" multiple="multiple" v-model="tipos" data-width="auto">
            <option v-for="(tipo, index) in tiposList" :value="tipo.value">@{{ tipo.label }}</option>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <select name="subtipos[]" class="form-control" multiple title="Asignar subtipo" multiple="multiple" v-model="subtipos">
            <option v-for="(item, indice) in subtiposList" :value="item.value" data-show-subtext="true">@{{ item.label }}</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/materiales') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
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
      sku: '',
      nombre: '',
      tiposList: '',
      subtiposList: '',
      tipos: [],
      subtipos: []
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

    methods: {},
  })
</script>
@endsection