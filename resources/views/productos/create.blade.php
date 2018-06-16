@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid">
  <div class="row">
    <div class="col-md-7">
      <h4>Nuevo Producto</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-md-7">
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('sku', null, ['class'=>'form-control-label']) !!}
          {!! Form::text('sku', null, ['class'=>'form-control-plaintext','v-model'=>'sku']) !!}
          {!! $errors->first('sku', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('tipo_id', 'Tipo', ['class'=>'form-control-label']) !!}
          {!! Form::select('tipo_id', \App\Tipo::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Selección','v-model'=>'tipo_id','@change'=>'getSTipos()']) !!}
          {!! $errors->first('tipo_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2" v-if="proppse == false">
          {!! Form::label('subtipo_id', 'Sub-Tipo', ['class'=>'form-control-label']) !!}
          <select name="subtipo_id" class="form-control" v-model='subtipo_id'>
            <option value="" disabled>Selección</option>
            <option v-for="(label, value) in subtipos" :value="value">@{{ label.nombre }}</option>
          </select>
          {!! $errors->first('subtipo_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
      </div>

      <!-- Morph to be MTP or PSE -->
      <div class="form-group" v-if="tipo_id != 8">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control col-md-5', 'autocomplete'=>'off' ,'v-model'=>'nombre']) !!}
        {!! $errors->first('nombre', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <!-- Morph to be MTP or PSE -->
      <div class="form-group" v-if="tipo_id == 8">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::select('nombre', \App\Materiale::pluck('nombre','nombre'), null, ['class'=>'form-control col-md-4','placeholder'=>'Seleccion']) !!}
        {!! $errors->first('nombre', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <!-- Morph to be MTP or PSE -->
      <div class="form-group">
        {!! Form::label('descripcion', 'Descripcion', ['class'=>'form-control-label']) !!}
        {!! Form::textarea('descripcion', null, ['class'=>'form-control col-md-5','size'=>'30x3','v-model'=>'descripcion']) !!}
        {!! $errors->first('descripcion', '<small class="help-block text-danger">:message</small>') !!}
      </div>

      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('marca_id', 'Marca', ['class'=>'form-control-label']) !!}
          {!! Form::select('marca_id', \App\Marca::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Selección','v-model'=>'marca_id']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('unidad_id', 'Unidad', ['class'=>'form-control-label']) !!}
          {!! Form::select('unidad_id', \App\Unidad::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Selección','v-model'=>'unidad_id']) !!}
        </div>
      </div>

      {{-- Propiedades Materia Prima --}}
      <div class="form-row mb-2">
        <div class="from-group mr-2">
          {!! Form::text('largo', null, ['class'=>'form-control','step'=>'any', 'v-model' => 'largo','placeholder'=>'Largo']) !!}
          {!! $errors->first('largo', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="from-group mr-2">
          {!! Form::text('ancho', null, ['class'=>'form-control','step'=>'any', 'v-model' => 'ancho','placeholder'=>'Ancho']) !!}
          {!! $errors->first('ancho', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="from-group mr-2">
          {!! Form::text('area', null, ['class'=>'form-control','step'=>'any', 'v-model' => 'area','placeholder'=>'Area']) !!}
          {!! $errors->first('area', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="from-group mr-2">
          {!! Form::text('espesor', null, ['class'=>'form-control','step'=>'any', 'v-model' => 'espesor','placeholder'=>'Espesor']) !!}
          {!! $errors->first('espesor', '<small class="help-block text-danger">:message</small>') !!}
        </div>
      </div>
    </div><!-- col-md-8 -->
  </div>

  <div class="row" v-if="proppse == true">
    <div class="col-md-6">
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::text('veta', null, ['class'=>'form-control','placeholder'=>'Veta']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('material', null, ['class'=>'form-control','placeholder'=>'Material']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('largo_izq', null, ['class'=>'form-control','placeholder'=>'Largo Izq.']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('largo_der', null, ['class'=>'form-control','placeholder'=>'Largo Der.']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('ancho_sup', null, ['class'=>'form-control','placeholder'=>'Ancho Sup.']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('ancho_inf', null, ['class'=>'form-control','placeholder'=>'Ancho Inf.']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('mec1', null, ['class'=>'form-control','placeholder'=>'Mec 1']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('mec2', null, ['class'=>'form-control','placeholder'=>'Mec 2.']) !!}
        </div>
      </div>
    </div>
  </div>

  <div class="row" v-if="proppto == true"><!--Modulos para Producto terminado -->
    <div class="col-md-10">
      <div class="form-group">
        <table class="table">
          <thead>
            <tr>
              <th>Modulo</th>
              <th>SKU</th>
              <th>Letra</th>
              <th>Descripción</th>
              <th>Cantidad</th>
              <th>Largo</th>
              <th>Ancho</th>
              <th>Material</th>
              <th>Mec1</th>
              <th>Mec2</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              td*10>input
            </tr>
          </tbody>
        </table>
      </div>
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
      tipo_id: '',
      subtipo_id: '',
      nombre: '',
      descripcion: '',
      marca_id: '',
      unidad_id: '',
      color_id: '',
      largo: '',
      ancho: '',
      area: '',
      espesor: '',
      importado: 0,
      min: '',
      max: '',
      subtipos: [],
      proppse: false,
      proppto: false,
      pto_pse: [
        { modulo: '' },
        { sku: '' },
        { letra: '' },
        { descripcion: '' },
        { cantidad: ' ' },
        { largo: '' },
        { ancho: '' },
        { material: '' },
        { mec1: '' },
        { mec2: '' }
      ]
    },

    methods: {
      getSTipos: function(){
        axios.get('/getSTipCodigo/' + this.tipo_id)
        .then( response => {
          this.subtipos = response.data
        })
        .catch( function(error) {
          console.log(error)
        })
      }
    },

    watch: {
      tipo_id: function(){
        this.sku = this.tipo_id
        if( this.tipo_id == 8 || this.tipo_id == 9 || this.tipo_id == 10 ){
          this.importado = false;
          this.min = 1;
          this.max = 1;
          this.proppse = true
          this.proppto = false;
        }else if (this.tipo_id == 11 || this.tipo_id == 12) {
          this.proppse = false;
          this.proppto = true;
        }else {
          this.proppse = false;
          this.proppto = false;
        }
      },
      subtipo_id: function(){
        this.sku = this.sku + '-' + this.subtipo_id
      }
    }
  })
</script>
@endsection