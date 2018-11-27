@extends('layouts.app')

@section('content')

<div class="container-fluid" id="app" v-cloak>
  <div class="row">
    <div class="col-md">
      <h3>Lista de Modulos</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/backend/modulos') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      {!! Form::model($modulo, ['route' => ['modulos.update', $modulo->id],'method'=>'PATCH']) !!}
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('sku_grupo', 'SKU Grupo', ['class' => 'form-control-label']) !!}
          {!! Form::text('sku_grupo', null, ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('tipo_id', 'Tipo', ['class'=>'form-control-label']) !!}
          {!! Form::select('tipo_id', \App\Tipo::where('acromtip','T')->pluck('nombre','id'), $modulo->tipo_id, ['class'=>'form-control','v-model'=>'tipo_id','@change'=>'getSubtipos()']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('subtipo_id', 'Subtipo', ['class'=>'form-control-label']) !!}
          <select name="subtipo_id" class="form-control" title="Asignar subtipo" v-model="subtipo_id">
            <option v-for="(item, indice) in subtipo_list" :value="item.value">@{{ item.label }}</option>
          </select>
        </div>
        <div class="form-group mr-2">
          {!! Form::label('categoria_id', 'Categoria', ['class'=>'form-control-label']) !!}
          <select name="categoria_id" class="form-control" title="Asignar subtipo" v-model="categoria_id">
            <option v-for="(item, indice) in categorias_list" :value="item.value">@{{ item.label }}</option>
          </select>
          {{-- {!! Form::select('categoria_id', \App\Categoria::pluck('nombre','id'), $modulo->categoria_id, ['class'=>'form-control']) !!} --}}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
          {!! Form::text('nombre', $modulo->nombre, ['class'=>'form-control']) !!}
        </div>
        {{-- <div class="form-group">
          {!! Form::label('consecutivo', 'Consecutivo', ['class'=>'form-control-label']) !!}
          {!! Form::number('consecutivo', $modulo->consecutivo, ['class'=>'form-control']) !!}
        </div> --}}
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          {!! Form::label('descripcion', 'Descripcion', ['class'=>'form-control-label']) !!}
          {!! Form::text('descripcion', $modulo->descripcion, ['class'=>'form-control']) !!}
        </div>
        {{-- <div class="form-group">
          {!! Form::label('variantes', 'Variantes', ['class'=>'form-control-label']) !!}
          {!! Form::number('variantes', $modulo->variantes, ['class'=>'form-control']) !!}
        </div> --}}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('saps', 'Sist. de Apertura', ['class'=>'form-control-label']) !!}
          <select name="saps[]" id="saps[]" class="form-control" multiple="true" v-model="saps" ref="selSap">
            <option v-for="(item, indice) in sap_list" :value="item.value">@{{ item.label }}</option>
          </select>
        </div>
        <div class="form-group mr-2">
          {!! Form::label('fondos', 'Tipo de Fondo', ['class'=>'form-control-label']) !!}
          <select name="fondos[]" id="fondos[]" class="form-control" multiple="true" v-model="fondos" ref="selFondo">
            <option v-for="(item, indice) in fondo_list" :value="item.value">@{{ item.label }}</option>
          </select>
        </div>
        
        <div class="form-group mr-2">
          {!! Form::label('espesor_caja_permitido', 'Espesor Caja Permitido', ['class'=>'form-control-label']) !!}
          {!! Form::select('espesor_caja_permitido', ["15"=>"15","18"=>"18","25"=>"25"], explode(",",$modulo->espesor_caja_permitido), ['class'=>'form-control','multiple']) !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('ancho_minimo', 'Ancho Min.', ['class'=>'form-control-label']) !!}
          {!! Form::number('ancho_minimo', $modulo->ancho_minimo, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('ancho_maximo', 'Ancho Max.', ['class'=>'form-control-label']) !!}
          {!! Form::number('ancho_maximo', $modulo->ancho_maximo, ['class'=>'form-control']) !!}
        </div>
        {{-- <div class="form-group mr-2">
          {!! Form::label('ancho_var', 'Ancho Var.', ['class'=>'form-control-label']) !!}
          {!! Form::number('ancho_var', $modulo->ancho_var, ['class'=>'form-control']) !!}
        </div> --}}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('alto_minimo', 'Ancho Min.', ['class'=>'form-control-label']) !!}
          {!! Form::number('alto_minimo', $modulo->alto_minimo, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('alto_maximo', 'Ancho Max.', ['class'=>'form-control-label']) !!}
          {!! Form::number('alto_maximo', $modulo->alto_maximo, ['class'=>'form-control']) !!}
        </div>
        {{-- <div class="form-group mr-2">
          {!! Form::label('alto_var', 'Ancho Var.', ['class'=>'form-control-label']) !!}
          {!! Form::number('alto_var', $modulo->alto_var, ['class'=>'form-control']) !!}
        </div> --}}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('profundidad_minima', 'Ancho Min.', ['class'=>'form-control-label']) !!}
          {!! Form::number('profundidad_minima', $modulo->profundidad_minima, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('profundidad_maxima', 'Ancho Max.', ['class'=>'form-control-label']) !!}
          {!! Form::number('profundidad_maxima', $modulo->profundidad_maxima, ['class'=>'form-control']) !!}
        </div>
        {{-- <div class="form-group mr-2">
          {!! Form::label('profundidad_var', 'Ancho Var.', ['class'=>'form-control-label']) !!}
          {!! Form::number('profundidad_var', $modulo->profundidad_var, ['class'=>'form-control']) !!}
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
      axios.get('/subtiposFiltro/' + this.tipo_id).then( response => { this.subtipo_list = response.data }).catch( function(error) { console.log(error); });
      axios.get('/categoriasFiltro/' + this.subtipo_id).then( response => { this.categorias_list = response.data }).catch( function(error) { console.log(error); });
      axios.get('/saplist').then(response => { this.sap_list = response.data; console.log(response.data) }).catch(function(error){ console.log(error)});
      axios.get('/fondolist').then(response => { this.fondo_list = response.data; console.log(response.data) }).catch(function(error){ console.log(error)});
    },

    data: {
      tipo_id: '{{ $modulo->tipo_id }}',
      subtipo_list: '',
      subtipo_id: '{{ $modulo->subtipo_id }}',
      categorias_list: '',
      categoria_id: '{{ $modulo->categoria_id }}',
      saps: [{{$modulo->saps}}],
      sap_list: '',
      fondos: [{{$modulo->fondos}}],
      fondo_list: '',
      selSap: ''
    },

    watch: {
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

    method: {
      getSubtipos: function(){
        axios.get('/subtiposFiltro/' + this.tipo_id).then( response => { this.subtipo_list = response.data }).catch( function(error) { console.log(error); });
      },
      getCategorias: function(){
        axios.get('/categoriasFiltro/' + this.subtipo_id).then( response => { this.categorias_list = response.data }).catch( function(error) { console.log(error); });
      }
    }

  });
</script>
@endsection