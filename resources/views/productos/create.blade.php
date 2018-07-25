@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid">
  <div class="row">
    <div class="col-md offset-md-1">
      <h4>Nuevo MTP</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 offset-md-1">
      {!! Form::open(['url' => 'frontend/productos', 'method' => 'POST']) !!}
      <div class="form-row">
        <div class="form-group mr-2 {{ $errors->has('sku') ? 'has-error' : '' }}">
          {!! Form::label('sku', 'SKU-Base', ['class' => 'form-control-label']) !!}
          {!! Form::text('sku', null, ['class' => 'form-control text-uppercase','v-model'=>'sku']) !!}
          <small id="emailHelp" class="form-text text-muted">Si conoce la Base SKU suministrela.</small>
          {!! $errors->first('sku', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('tipo_id', 'Tipo', ['class'=>'form-control-label']) !!}
          {!! Form::select('tipo_id', \App\Tipo::where('tipologia','=','MTP')->pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Seleccion','v-model'=>'tipo','@change'=>'getSubtipos']) !!}
          {!! $errors->first('tipo_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group">
          {!! Form::label('subtipo_id', 'Sub-Tipo', ['class'=>'form-control-label']) !!}
          <select class="form-control" name="subtipo_id" v-model="subtipo" @change="getSkuBase">
            <option value="" disabled>Seleccion</option>
            <option v-for="(item,index) in subtipos" :value="index">@{{ item }}</option>
          </select>
          {!! $errors->first('subtipo_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class' => 'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class' => 'form-control col-md-4','placeholder'=>'Nombre']) !!}
        {!! $errors->first('nombre', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group">
        {!! Form::label('descripcion', 'Descripción', ['class' => 'form-control-label']) !!}
        {!! Form::textarea('descripcion', 'S/D', ['class' => 'form-control col-md-4','size'=>'30x3','placeholder'=>'Descripcion']) !!}
        {!! $errors->first('descripcion', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('marca_id', 'Marca', ['class' => 'form-control-label']) !!}
          {!! Form::select('marca_id', \App\Marca::pluck('nombre','id'), null, ['class' => 'form-control','placeholder'=>'Seleccion','v-model'=>'marca','@change'=>'setMarca']) !!}
          {!! $errors->first('marca_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('unidad_id', 'Unidad', ['class' => 'form-control-label']) !!}
          {!! Form::select('unidad_id', \App\Unidad::pluck('nombre','id'), null, ['class' => 'form-control','placeholder'=>'Seleccion','v-model'=>'unidad']) !!}
          {!! $errors->first('unidad_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group">
          {!! Form::label('importado', 'Importado', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('importado', true, false, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="form-row">
        <small class="text-info">* Existencias Minima y Maxima</small>
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('minimo', 'Minimo', ['class' => 'form-control-label']) !!}
          {!! Form::number('minimo', 1, ['class' => 'form-control text-right']) !!}
          {!! $errors->first('min', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('maximo', 'Maximo', ['class' => 'form-control-label']) !!}
          {!! Form::number('maximo', 1, ['class' => 'form-control text-right']) !!}
          {!! $errors->first('max', '<small class="help-block text-danger">:message</small>') !!}
        </div>
      </div>
      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/proveedores') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>


</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var app = new Vue({
    el: '#app',

    data: {
      sku: '',
      base: '',
      basesku: '',
      numeracion: '',
      tipo: '',
      subtipos: '',
      subtipo: '',
      marca: '',
      unidad: ''
    },

    watch: {

    },

    methods: {
      getSubtipos: function(){
        axios.get('/mtpsubtipos/' + this.tipo)
        .then( response => {
          this.subtipos = response.data
        })
        .catch(function(error) {
          console.log(error)
        })
      },
      getSkuBase: function(){
        axios.get('/getBaseSku/' + this.tipo + '/' + this.subtipo)
        .then( response => {
          this.numeracion = response.data[0].numeracion;
          this.base = response.data[0].skubase;
          this.sku = this.base;
        })
        .catch(function(error) {
          console.log(error)
        })
      },
      setMarca: function(){
        axios.get('/getMarca/' + this.marca)
        .then( response => {
          this.basesku = this.base + '-' + response.data.acronimo + '-';
          this.sku = this.basesku;
          this.searchSKU();
        })
        .catch(function(error){
          console.log(error)
        })
      },
      searchSKU: function(){
        axios.get('/querySKU/' + this.basesku)
        .then( response => {
          if(response.data.length > 0){
            // console.log(response.data[0].sku);
            this.numeracion = Number(response.data[0].sku.substr(-6));
            var num = this.numeracion + 1;
            Number.prototype.pad = function(size){
              var s = String(this);
              while (s.length < (size || 2)) { s = "0" + s; }
              return s;
            }
            this.sku = this.basesku + num.pad(6);
          }else {
            this.sku = this.basesku + '000001';
          }
        })
        .catch(function(error) {
          console.log(error);
        })
      }
    }
  })
</script>
@endsection