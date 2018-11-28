@extends('layouts.app')

@section('content')

<div class="container-fluid" id="app" v-cloak>
  <div class="row">
    <div class="col-md">
      <h3>Lista de Modulos <small>Nuevo</small></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/backend/modulos') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      {!! Form::open(['url' => 'backend/modulos', 'method' => 'POST']) !!}
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('sku_grupo', 'SKU Grupo', ['class' => 'form-control-label']) !!}
          {!! Form::text('sku_grupo', null, ['class' => 'form-control','required','v-model' => 'sku_grupo','readonly']) !!}
          {!! $errors->first('sku_grupo', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('tipo_id', 'Tipo', ['class'=>'form-control-label']) !!}
          {!! Form::select('tipo_id', \App\Tipo::where('acromtip','T')->pluck('nombre','id'), null, ['class'=>'form-control','v-model'=>'tipo_id','placeholder'=>'Seleccion']) !!}
          {!! $errors->first('tipo_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('subtipo_id', 'Subtipo', ['class'=>'form-control-label']) !!}
          <select name="subtipo_id" class="form-control" title="Asignar subtipo" v-model="subtipo_id">
            <option value="" selected>Seleccion</option>
            <option v-for="(item, indice) in subtipo_list" :value="item.value">@{{ item.label }}</option>
          </select>
          {!! $errors->first('subtipo_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('categoria_id', 'Categoria', ['class'=>'form-control-label']) !!}
          <select name="categoria_id" class="form-control" title="Asignar subtipo" v-model="categoria_id">
            <option value="" selected>Seleccion</option>
            <option v-for="(item, indice) in categorias_list" :value="item.value">@{{ item.label }}</option>
          </select>
          {!! $errors->first('categoria_id_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
          {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
          {!! $errors->first('nombre', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        {{-- <div class="form-group">
          {!! Form::label('consecutivo', 'Consecutivo', ['class'=>'form-control-label']) !!}
          {!! Form::number('consecutivo', null, ['class'=>'form-control','placeholder'=>'Nº Consecutivo']) !!}
        </div> --}}
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          {!! Form::label('descripcion', 'Descripcion', ['class'=>'form-control-label']) !!}
          {!! Form::text('descripcion', null, ['class'=>'form-control','placeholder'=>'Descripcion']) !!}
          {!! $errors->first('descripcion', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        {{-- <div class="form-group">
          {!! Form::label('variantes', 'Variantes', ['class'=>'form-control-label']) !!}
          {!! Form::number('variantes', null, ['class'=>'form-control','placeholder'=>'Variantes']) !!}
        </div> --}}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('saps', 'Sist. de Apertura', ['class'=>'form-control-label']) !!}
          <select name="saps[]" id="saps[]" class="form-control" multiple v-model="saps" ref="selSap">
            <option v-for="(item, indice) in sap_list" :value="item.value">@{{ item.label }}</option>
          </select>
        </div>
        <div class="form-group mr-2">
          {!! Form::label('fondos', 'Tipo de Fondo', ['class'=>'form-control-label']) !!}
          <select name="fondos[]" id="fondos[]" class="form-control" multiple v-model="fondos" ref="selFondo">
            <option v-for="(item, indice) in fondo_list" :value="item.value">@{{ item.label }}</option>
          </select>
        </div>
        <div class="form-group mr-2">
          {!! Form::label('espesor_caja_permitido', 'Espesor Caja Permitido', ['class'=>'form-control-label']) !!}
          {!! Form::select('espesor_caja_permitido[]', ["15"=>"15","18"=>"18","25"=>"25"], null, ['class'=>'form-control','multiple']) !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('ancho_minimo', 'Ancho Min.', ['class'=>'form-control-label']) !!}
          {!! Form::number('ancho_minimo', null, ['class'=>'form-control','placeholder'=>'Ancho Minimo']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('ancho_maximo', 'Ancho Max.', ['class'=>'form-control-label']) !!}
          {!! Form::number('ancho_maximo', null, ['class'=>'form-control','placeholder'=>'Ancho Maximo']) !!}
        </div>
        {{-- <div class="form-group mr-2">
          {!! Form::label('ancho_var', 'Ancho Var.', ['class'=>'form-control-label']) !!}
          {!! Form::number('ancho_var', null, ['class'=>'form-control','placeholder'=>'Ancho Permitido']) !!}
        </div> --}}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('alto_minimo', 'Alto Min.', ['class'=>'form-control-label']) !!}
          {!! Form::number('alto_minimo', null, ['class'=>'form-control','placeholder'=>'Alto Minimo']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('alto_maximo', 'Alto Max.', ['class'=>'form-control-label']) !!}
          {!! Form::number('alto_maximo', null, ['class'=>'form-control','placeholder'=>'Alto Maximo']) !!}
        </div>
        {{-- <div class="form-group mr-2">
          {!! Form::label('alto_var', 'Ancho Var.', ['class'=>'form-control-label']) !!}
          {!! Form::number('alto_var', null, ['class'=>'form-control','placeholder'=>'Alto Var']) !!}
        </div> --}}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('profundidad_minima', 'Profundidad Min.', ['class'=>'form-control-label']) !!}
          {!! Form::number('profundidad_minima', null, ['class'=>'form-control','placeholder'=>'Profundidad Minima']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('profundidad_maxima', 'Profundidad Max.', ['class'=>'form-control-label']) !!}
          {!! Form::number('profundidad_maxima', null, ['class'=>'form-control', 'placeholder'=>'Profundidad Maxima']) !!}
        </div>
        {{-- <div class="form-group mr-2">
          {!! Form::label('profundidad_var', 'Ancho Var.', ['class'=>'form-control-label']) !!}
          {!! Form::number('profundidad_var', null, ['class'=>'form-control', 'placeholder'=>'Profundidad Var']) !!}
        </div> --}}
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/modulos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
  var app = new Vue({
    el: '#app',

    created(){
      axios.get('/saplist').then(response => { this.sap_list = response.data; console.log(response.data) }).catch(function(error){ console.log(error)});
      axios.get('/fondolist').then(response => { this.fondo_list = response.data; console.log(response.data) }).catch(function(error){ console.log(error)});
    },

    data: {
      tipo_id: '',
      subtipo_list: '',
      subtipo_id: '',
      categorias_list: '',
      categoria_id: '',
      sku_base: '',
      sku_grupo: '',
      saps: [],
      sap_list: '',
      fondos: [],
      fondo_list: '',
      selSap: ''
    },

    watch: {
      tipo_id(){
        if(this.tipo_id){
          axios.get('/subtiposFiltro/' + this.tipo_id)
          .then( response => {
            console.log('Respuesta 200');
            this.subtipo_list = response.data
          })
          .catch( function(error) { console.log(error); });
        }
      },
      subtipo_id(){
        axios.get('/categoriasFiltro/' + this.subtipo_id)
        .then( response => {
          this.categorias_list = response.data
        })
        .catch( function(error) { console.log(error); });
      },
      categoria_id(){
        axios.get('/makeSKU/' + this.tipo_id + '/' + this.subtipo_id + '/' + this.categoria_id)
        .then(response => {
          this.sku_base = response.data;
          this.sku_grupo = this.sku_base;
        })
        .catch( function(error){
          console.log(error)
        });
      },
      saps(){
        if(this.saps.length > 1 && this.saps.includes(1)){
          this.saps = [];
        }
      },
      fondos(){
        if(this.fondos.length > 1 && this.fondos.includes(1)){
          this.fondos = [];
        }
      }
    },


  });
</script>
@endsection