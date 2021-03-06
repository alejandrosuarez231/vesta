@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid" v-cloak>
  <div class="row">
    <div class="col-md offset-md-1">
      <h4>Editar MTP</h4>
      <ul class="nav">
        <li class="nav-item"><a href="{{ URL::previous() }}" title="">Regresar</a></li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 offset-md-1">
      {!! Form::model($producto, ['route' => ['productos.update', $producto->id],'method' => 'PATCH']) !!}
      <div class="form-row">
        <div class="form-group mr-2 {{ $errors->has('sku') ? 'has-error' : '' }}">
          {!! Form::label('sku', 'SKU-Base', ['class' => 'form-control-label']) !!}
          {!! Form::text('sku', null, ['class' => 'form-control text-uppercase','v-model'=>'sku','readonly']) !!}
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
            <option v-for="(item,index) in subtipos" :value="item.value">@{{ item.label }}</option>
          </select>
          {!! $errors->first('subtipo_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class' => 'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class' => 'form-control col-md-4','placeholder'=>'Nombre','v-model'=>'nombre']) !!}
        {!! $errors->first('nombre', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      {{-- <div class="form-group">
        {!! Form::label('descripcion', 'Descripción', ['class' => 'form-control-label']) !!}
        {!! Form::textarea('descripcion', 'S/D', ['class' => 'form-control col-md-4','size'=>'30x3','placeholder'=>'Descripcion']) !!}
        {!! $errors->first('descripcion', '<small class="help-block text-danger">:message</small>') !!}
      </div> --}}
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
      <span class="text-secondary font-weight-bold" v-if="tipo !=1">*<small>Definir Propiedades</small></span>
      <div class="form-row" v-if="tipo !=1">
        <div class="form-group mr-2">
          {!! Form::label('setancho', 'Ancho', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('setancho', true, false, ['class' => 'form-control','v-model' => 'setancho']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('setlargo', 'Largo', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('setlargo', true, false, ['class' => 'form-control','v-model' => 'setlargo']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('setespesor', 'Espesor', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('setespesor', true, false, ['class' => 'form-control','v-model' => 'setespesor']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('setcolor', 'Color', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('setcolor', true, false, ['class' => 'form-control','v-model' => 'setcolor']) !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-2" v-if="tipo == 4 || setancho == 1">
          {!! Form::label('ancho', 'Ancho', ['class'=>'form-control-label']) !!}
          {!! Form::text('ancho', null, ['class'=>'form-control','placeholder'=>'Ancho']) !!}
        </div>
        <div class="form-group mr-2"  v-if="tipo == 3 || tipo == 4 || (tipo == 5 && subtipo == 19) || (tipo == 7 && subtipo == 23) || (tipo == 7 && subtipo == 26) || (tipo == 7 && subtipo == 29) || setlargo == 1">
          {!! Form::label('largo', 'Largo', ['class'=>'form-control-label']) !!}
          <input class="form-control" list="largos" name="largos" placeholder="Largo" v-if="tipo == 3 || (tipo == 5 && subtipo == 19) || (tipo == 7 && subtipo == 23) || (tipo == 7 && subtipo == 26) || (tipo == 7 && subtipo == 29) || setlargo == 1">
          <datalist id="largos">
            <option value="300">
            <option value="350">
            <option value="400">
            <option value="450">
            <option value="500">
            <option value="550">
            <option value="600">
            <option value="300">
            <option value="350">
            <option value="400">
            <option value="450">
            <option value="500">
            <option value="550">
            <option value="600">
            <option value="300">
            <option value="350">
            <option value="400">
            <option value="450">
            <option value="500">
            <option value="550">
            <option value="600">
            <option value="300">
            <option value="350">
            <option value="400">
            <option value="450">
            <option value="500">
            <option value="550">
            <option value="600">
          </datalist>
          {!! Form::number('largo', null, ['class'=>'form-control','placeholder'=>'Largo','v-if'=>'tipo == 4']) !!}
        </div>
        <div class="form-group mr-2" v-if="tipo == 4 || (tipo == 5 && subtipo == 19) || setespesor == 1">
          {!! Form::label('espesor', 'Espesor', ['class'=>'form-control-label']) !!}
          {!! Form::text('espesor', null, ['class'=>'form-control','placeholder'=>'Espesor']) !!}
        </div>
        <div class="form-group mr-2"  v-if="tipo == 4 || setcolor">
          {!! Form::label('color_id', 'Color', ['class'=>'form-control-label']) !!}
          {!! Form::select('color_id', \App\Colore::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Selección']) !!}
        </div>
        <div class="form-group mr-2" {{-- v-if="propiedades.length > 0" --}}>
          {!! Form::label('extra_id', 'Prop. Extra', ['class'=>'form-control-label']) !!}
          <select class="form-control" name="extra_id" v-model="extra">
            <option value="" selected disabled>Selección</option>
            <option v-for="propiedad in propiedades" :value="propiedad.extra.id">@{{ propiedad.extra.propiedad }}</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <small class="text-info">* Existencias Minima y Maxima</small>
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('minimo', 'Minimo', ['class' => 'form-control-label']) !!}
          {!! Form::number('minimo', 1, ['class' => 'form-control text-right', 'v-model' => 'minimo']) !!}
          {!! $errors->first('min', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('maximo', 'Maximo', ['class' => 'form-control-label']) !!}
          {!! Form::number('maximo', 1, ['class' => 'form-control text-right', 'v-model' => 'maximo']) !!}
          {!! $errors->first('max', '<small class="help-block text-danger">:message</small>') !!}
        </div>
      </div>
      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url()->previous() }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>


</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var app = new Vue({
    el: '#app',

    created: function() {
      axios.get('/ProductoData/' + '{{ $producto->id }}')
      .then( response => {
        this.sku = response.data.sku;
        this.tipo = response.data.tipo_id;
        this.subtipo = response.data.subtipo_id;
        this.nombre = response.data.nombre;
        this.marca = response.data.marca_id;
        this.unidad = response.data.unidad_id;
        this.extra = response.data.extra_id;
        this.propiedades = response.data.propiedad_id;
        this.minimo = response.data.minimo;
        this.maximo = response.data.maximo;
        this.edit = true;
      })
      .catch(function(error){
        console.log(error)
      })
    },

    data: {
      sku: '',
      base: '',
      basesku: '',
      numeracion: '',
      tipo: '',
      subtipos: '',
      subtipo: '',
      nombre: '',
      marca: '',
      unidad: '',
      vExtra: false,
      extra: '',
      propiedades: '',
      minimo: '',
      maximo: '',
      setancho: false,
      setlargo: false,
      setespesor: false,
      setcolor: false,
      edit: false
    },

    watch: {
      tipo: function() {
        axios.get('/subtipos/' + this.tipo).then(response =>{ this.subtipos = response.data }).catch(function(error){ console.log(error)});
        if(this.sku == null){
          this.getSkuBase();
          this.setMarca();
        }
        axios.get('/propsextra/' + this.tipo + '/' + this.subtipo)
          .then( response => {
            this.propiedades = response.data;
            if(this.propiedades.length > 0){
              this.vExtra = true;
              console.log(this.propiedades);
            }else {
              this.vExtra = false;
            }
          })
          .catch(function(error) {
            console.log(error);
          })
      },
      subtipo: function() {

      },
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