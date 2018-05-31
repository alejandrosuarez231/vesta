@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md offset-1">
      <h4 class="text-primary">Productos <small class="text-secondary">Crear nuevo registro</small></h4>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-7 offset-1">
      {!! Form::open(['url'=>'productos','method'=>'POST']) !!}
      <div class="form-row">
        <div class="form-group mr-1">
          {!! Form::label('sku', 'SKU', ['class'=>'form-control-label font-weight-bold']) !!}
          <input class="form-control" type="hidden" name="sku" value="" placeholder="COD SKU" v-model="sku" readonly>
          <input class="form-control" type="text" name="sku" :value="sku | implode" placeholder="COD SKU" readonly>
          <span class="text-danger"><small>@if ($errors->has('sku')) {{ $errors->first('sku') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('categoria_id', 'Categoria', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::select('categoria_id', \App\Categoria::pluck('nombre','id'), null, ['class'=>'form-control', 'placeholder'=>'Selección','v-model'=>'categoria_id','@change'=>'getCatCod()']) !!}
          <span class="text-danger"><small>@if ($errors->has('categoria_id')) {{ $errors->first('categoria_id') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('subcategoria_id', 'Sub-Categoria', ['class'=>'form-control-label font-weight-bold']) !!}
          <select name="subcategoria_id" class="form-control" v-model="subcategoria_id" @change="getSubCatAcron()">
            <option value="" disabled>Selección</option>
            <option v-for="option in subcategorias" v-bind:value="option.id">@{{ option.nombre }}</option>
          </select>
          <span class="text-danger"><small>@if ($errors->has('subcategoria_id')) {{ $errors->first('subcategoria_id') }} @endif</small></span>
        </div>
      </div>
      <div class="form-group mr-1">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control col-md-10','placeholder'=>'Nombre del Producto','v-model'=>'nombre']) !!}
        <span class="text-danger"><small>@if ($errors->has('nombre')) {{ $errors->first('nombre') }} @endif</small></span>
      </div>
      <div class="form-group mr-1">
        {!! Form::label('descripcion', 'Descripcion', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::textarea('descripcion', null, ['class'=>'form-control col-md-10','size'=>'30x3','placeholder'=>'Descripción','v-model'=>'descripcion']) !!}
        <span class="text-danger"><small>@if ($errors->has('descripcion')) {{ $errors->first('descripcion') }} @endif</small></span>
      </div>
      <div class="form-row">
        <div class="form-group mr-3 mb-2">
          {!! Form::label('unidad_id', 'Unidad', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::select('unidad_id', \App\Unidad::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Selección','v-model'=>'unidad_id']) !!}
          <span class="text-danger"><small>@if ($errors->has('unidad_id')) {{ $errors->first('unidad_id') }} @endif</small></span>
        </div>
      </div>
      {{-- Propiedades del Producto --}}
      <div class="form-row">
        <label class="form-control-label font-weight-bold">Propiedades del Producto</label>
      </div>
      <div class="form-row">
        <div class="form-group mr-1">
          <input class="form-control text-right" type="number" name="largo" value="" placeholder="Largo" v-model="largo">
          <span class="text-secondary font-weight-bold"><small>Propiedad - largo</small></span>
        </div>
        <div class="form-group mr-1">
          <input class="form-control text-right" type="number" name="largoizq" value="" placeholder="Largo IZQ" v-model="largoizq">
          <span class="text-secondary font-weight-bold"><small>Propiedad - largo IZQ</small></span>
        </div>
        <div class="form-group mr-1">
          <input class="form-control text-right" type="number" name="largoder" value="" placeholder="Largo DER" v-model="largoder">
          <span class="text-secondary font-weight-bold"><small>Propiedad - largo DER</small></span>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group mr-1">
          <input class="form-control text-right" type="number" name="ancho" value="" placeholder="Ancho" v-model="ancho">
          <span class="text-secondary font-weight-bold"><small>Propiedad - Ancho</small></span>
        </div>
        <div class="form-group mr-1">
          <input class="form-control text-right" type="number" name="anchosup" value="" placeholder="Ancho SUP" v-model="anchosup">
          <span class="text-secondary font-weight-bold"><small>Propiedad - Ancho SUP</small></span>
        </div>
        <div class="form-group mr-1">
          <input class="form-control text-right" type="number" name="anchoinf" value="" placeholder="Ancho INF" v-model="anchoinf">
          <span class="text-secondary font-weight-bold"><small>Propiedad - Ancho INF</small></span>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group mr-1">
          <input class="form-control text-right" type="number" name="mec1" value="" placeholder="MEC 1" v-model="mec1">
          <span class="text-secondary font-weight-bold"><small>Propiedad - Mec 1</small></span>
        </div>
        <div class="form-group mr-1">
          <input class="form-control text-right" type="number" name="mec2" value="" placeholder="MEC 2" v-model="mec2">
          <span class="text-secondary font-weight-bold"><small>Propiedad - Mec 2</small></span>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group mr-1">
          {!! Form::label('importado', 'Importado', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::select('importado', [0=>'No',1=>'Si'], null, ['class'=>'form-control','placeholder'=>'Selección','v-model'=>'importado']) !!}
          <span class="text-danger"><small>@if ($errors->has('importado')) {{ $errors->first('importado') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('min', 'Existencia Mínima', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::number('min', null, ['class'=>'form-control','placeholder'=>'1','v-model'=>'min']) !!}
          <span class="text-danger"><small>@if ($errors->has('min')) {{ $errors->first('min') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('max', 'Existencia Máxima', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::number('max', null, ['class'=>'form-control','placeholder'=>'100','v-model'=>'max']) !!}
          <span class="text-danger"><small>@if ($errors->has('max')) {{ $errors->first('max') }} @endif</small></span>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt font-weight-bold"></i> Registrar</button>
      <a class="btn btn-warning" href="{{ url('/home') }}" title="Cancelar"><i class="fas fa-ban text-danger font-weight-bold"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
    <div class="col-md-4">

        <p>
          Producto Tipo: @{{ producto_tipo }} <br>
          SKU: @{{ sku }} <br>
          Categoria ID: @{{ categoria_id }} <br>
          Sub Categoria: @{{ subcategoria_id }} <br>
          Tipo: @{{ tipo }} <br>
          Nombre: @{{ nombre }} <br>
          Descripción: @{{ descripcion }} <br>
          Unidad ID: @{{ unidad_id }} <br>
          Largo: @{{ largo }} <br>
          Largo IZQ: @{{ largoizq }} <br>
          Largo DER: @{{ largoder }} <br>
          ancho: @{{ ancho }} <br>
          ancho SUP: @{{ anchosup }} <br>
          ancho INF: @{{ anchoinf }} <br>
          Importado: @{{ importado }} <br>
          Cant. MIN: @{{ min }} <br>
          Cant. MAX: @{{ max }} <br>
        </p>

    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  var app = new Vue({
    el: '#app',
    data: {
      producto_tipo: '',
      sku: [],
      codSku: '',
      categoria_id: '',
      subcategorias: [],
      subcategoria_id: '',
      tipo: '',
      nombre: '',
      descripcion: '',
      unidad_id: '',
      largo: '',
      largoizq: '',
      largoder: '',
      ancho: '',
      anchosup: '',
      anchoinf: '',
      mec1: '',
      mec2: '',
      importado: '',
      min: '',
      max: ''
    },
    methods: {
      getCatCod: function(){
        axios.get('/getCatCodigo/' + this.categoria_id)
        .then( response => {
          this.sku.push(response.data.acronimo);
        });
        axios.get('/getSCatCodigo/' + this.categoria_id)
        .then( response => {
          console.log(response.data);
          this.subcategorias = response.data;
        });
      },
      getSubCatAcron: function(){
        this.sku.push(this.subcategorias[this.subcategoria_id].acronimo);
      }
    },
    filters: {
      implode: function(value, piece, key) {
        piece = piece ? piece : '-';
        if(_.isUndefined(key)){
          return value.join(piece);
        }
        return _.pluck(value, key).join(piece);
      }
    }
  });
</script>
@endsection