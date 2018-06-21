@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid">
  <div class="row">
    <div class="col-md-7">
      <h4>Nuevo Producto</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
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
        {!! Form::text('nombre', null, ['class'=>'form-control col-md-5 text-uppercase', 'autocomplete'=>'off' ,'v-model'=>'nombre']) !!}
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

      <div class="form-row" v-if="proppto == false && proppse == false ">
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
        <legend>Propiedades</legend>
        <div class="from-group mr-2 mb-2">
          {!! Form::text('largo', null, ['class'=>'form-control text-uppercase','step'=>'any', 'v-model' => 'largo','placeholder'=>'Largo']) !!}
          {!! $errors->first('largo', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="from-group mr-2 mb-2">
          {!! Form::text('ancho', null, ['class'=>'form-control text-uppercase','step'=>'any', 'v-model' => 'ancho','placeholder'=>'Ancho']) !!}
          {!! $errors->first('ancho', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="from-group mr-2 mb-2">
          {!! Form::text('profundidad', null, ['class'=>'form-control text-uppercase','step'=>'any', 'v-model' => 'profundidad','placeholder'=>'Profundidad']) !!}
          {!! $errors->first('profundidad', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="from-group mr-2 mb-2" v-if="proppto == false">
          {!! Form::text('area', null, ['class'=>'form-control text-uppercase','step'=>'any', 'v-model' => 'area','placeholder'=>'Area']) !!}
          {!! $errors->first('area', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="from-group mr-2 mb-2" v-if="proppto == false">
          {!! Form::text('espesor', null, ['class'=>'form-control text-uppercase','step'=>'any', 'v-model' => 'espesor','placeholder'=>'Espesor']) !!}
          {!! $errors->first('espesor', '<small class="help-block text-danger">:message</small>') !!}
        </div>
      </div>
    </div><!-- col-md -->
    <div class="col-md border border-info rounded mb-2" style="background-color: #e0f7fa;" v-if="proppto == true">
      <div class="form-group p-2">
        {!! Form::checkbox('combo', null, null, ['class'=>'form-check-input','v-model'=>'combo']) !!}
        {!! Form::label('combo', 'Combo/Compuesto', ['class'=>"form-check-label font-weight-bold"]) !!}
      </div>
      <div class="form-group mb-1 p-2" v-if="combo == true">
        <legend>PTO's</legend>
        <table class="table">
          <thead>
            <tr>
              <th>SKU</th>
              <th>Descripción</th>
              <th>Cantidad</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>data</td>
              <td>data</td>
              <td>data</td>
            </tr>
          </tbody>
        </table>
      </div>
      <legend>MTP's</legend>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>SKU</th>
            <th>Descripción</th>
            <th colspan="2">Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(mtp, $index) in mtps" track-by="$index">
            <td> @{{ $index +1 }} </td>
            <td>
              <input name="" class="form-control-plaintext text-right text-uppercase" type="text" v-model="mtp.sku" placeholder="SKU">
            </td>
            <td>
              {!! Form::select('mtp_producto_id', \App\Producto::where('tipo_id','<',8)->pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Selección','v-model'=>'mtp.mtp_producto_id']) !!}
            </td>
            <td>
              <input name="" class="form-control-plaintext text-right" type="number" v-model="mtp.cantidad" placeholder="Cantidad">
            </td>
            <td>
              <small>
                <span class="text-primary font-weight-bold" @click="addRowMTP($index)" title="Add"><i class="fas fa-plus"></i></span>
                <span class="text-danger font-weight-bold" @click="removeRowMTP($index)" v-if="mtps.length > 1" title="Remove"><i class="fas fa-minus"></i></span>
              </small>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row" v-if="proppse == true">
    <div class="col-md-6">
      <legend>Propiedades Extra</legend>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::text('veta', null, ['class'=>'form-control text-uppercase','placeholder'=>'Veta']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('material', null, ['class'=>'form-control text-uppercase','placeholder'=>'Material']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('largo_izq', null, ['class'=>'form-control text-uppercase','placeholder'=>'Largo Izq.']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('largo_der', null, ['class'=>'form-control text-uppercase','placeholder'=>'Largo Der.']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('ancho_sup', null, ['class'=>'form-control text-uppercase','placeholder'=>'Ancho Sup.']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('ancho_inf', null, ['class'=>'form-control text-uppercase','placeholder'=>'Ancho Inf.']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('mec1', null, ['class'=>'form-control text-uppercase','placeholder'=>'Mec 1']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('mec2', null, ['class'=>'form-control text-uppercase','placeholder'=>'Mec 2.']) !!}
        </div>
      </div>
    </div>
  </div>

  <div class="row" style="background-color: #fffde7;" v-if="proppto == true"><!--Modulos para Producto terminado -->
    <div class="col-md-10">
      <legend>Partes</legend>
      <div class="form-group">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Modulo</th>
              <th>SKU</th>
              <th>Letra</th>
              <th>Descripción</th>
              <th>Cantidad</th>
              <th>Largo</th>
              <th>Ancho</th>
              <th>Material</th>
              <th>Mec1</th>
              <th colspan="2">Mec2</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, $index) in pto_pse" track-by="$index">
              <td>@{{ $index +1 }}</td>
              <td><input name="modulo" class="form-control-plaintext text-uppercase" type="text" v-model="item.modulo" placeholder="Modulo"></td>
              <td><input name="sku" class="form-control-plaintext text-uppercase" type="text" v-model="item.sku" placeholder="SKU"></td>
              <td><input name="letra" class="form-control-plaintext text-uppercase" type="text" v-model="item.letra" placeholder="Letra"></td>
              <td><input name="descripcion" class="form-control-plaintext text-uppercase" type="text" v-model="item.descripcion" placeholder="Descripción"></td>
              <td><input name="cantidad" class="form-control-plaintext text-uppercase" type="text" v-model="item.cantidad" placeholder="Cantidad"></td>
              <td><input name="largo" class="form-control-plaintext text-uppercase" type="text" v-model="item.largo" placeholder="Largo"></td>
              <td><input name="ancho" class="form-control-plaintext text-uppercase" type="text" v-model="item.ancho" placeholder="Ancho"></td>
              <td><input name="material" class="form-control-plaintext text-uppercase" type="text" v-model="item.material" placeholder="Material"></td>
              <td><input name="mec1" class="form-control-plaintext text-uppercase" type="text" v-model="item.mec1" placeholder="Mec1"></td>
              <td><input name="mec2" class="form-control-plaintext text-uppercase" type="text" v-model="item.mec2" placeholder="Mec2"></td>
              <td>
                <small>
                  <span class="text-primary font-weight-bold" @click="addRow($index)" title="Add"><i class="fas fa-plus"></i></span>
                  <span class="text-danger font-weight-bold" @click="removeRow($index)" v-if="pto_pse.length > 1" title="Remove"><i class="fas fa-minus"></i></span>
                </small>
              </td>
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
      profundidad: '',
      area: '',
      espesor: '',
      importado: 0,
      min: '',
      max: '',
      subtipos: [],
      proppse: false,
      proppto: false,
      pto_pse: [
      { modulo: '', sku: '', letra: '', descripcion: '', cantidad: ' ', largo: '', ancho: '', material: '', mec1: '', mec2: '' }
      ],
      letras: [ { letra: 'A' }, { letra: 'B' }, { letra: 'C' }, { letra: 'D' }, { letra: 'E' }, { letra: 'F' }, { letra: 'G' }, { letra: 'H' }, { letra: 'I' }, { letra: 'J' }, { letra: 'K' }, { letra: 'L' }, { letra: 'M' }, { letra: 'N' }, { letra: 'O' }, { letra: 'P' }, { letra: 'Q' }, { letra: 'R' }, { letra: 'S' }, { letra: 'T' }, { letra: 'U' }, { letra: 'V' }, { letra: 'W' }, { letra: 'X' }, { letra: 'Y' }, { letra: 'Z' } ],
      combo: false,
      mtps: [ { sku: '', mtp_producto_id: '', cantidad: '' }],
    },

    computed: {},

    methods: {
      getSTipos: function(){
        axios.get('/getSTipCodigo/' + this.tipo_id)
        .then( response => {
          this.subtipos = response.data
        })
        .catch( function(error) {
          console.log(error)
        })
      },
      addRow: function (index) {
        try {
          this.pto_pse.splice(index + 1, 0, {});
        } catch(e)
        {
          console.log(e);
        }
      },
      removeRow: function(index){
        console.log(index);
        if( this.pto_pse.length > 1){
          this.pto_pse.splice(index, 1);
        }
      },
      /* MTP's */
      addRowMTP: function (index) {
        try {
          this.mtps.splice(index + 1, 0, {});
        } catch(e)
        {
          console.log(e);
        }
      },
      removeRowMTO: function(index){
        console.log(index);
        if( this.mtps.length > 1){
          this.mtps.splice(index, 1);
        }
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