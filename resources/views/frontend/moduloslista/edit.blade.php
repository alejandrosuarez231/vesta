@extends('layouts.app')

@section('content')

<div class="container-fluid" id="app">
  <div class="row">
    <div class="col-md">
      <h3>Lista de Modulos</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/frontend/moduloslista') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      {!! Form::model($modulo, ['route' => ['moduloslista.update', $modulo->id],'method'=>'PATCH']) !!}
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('sku_grupo', 'SKU Grupo', ['class' => 'form-control-label']) !!}
          {!! Form::text('sku_grupo', null, ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('tipo_id', 'Tipo', ['class'=>'form-control-label']) !!}
          {!! Form::select('tipo_id', \App\Tipo::pluck('nombre','id'), $modulo->tipo_id, ['class'=>'form-control']) !!}
          {{-- <select name="tipos[]" class="form-control" multiple data-live-search="true" title="Asignar tipo" multiple="multiple" v-model="tipos" data-width="auto">
            <option v-for="(tipo, index) in tiposList" :value="tipo.value">@{{ tipo.label }}</option>
          </select> --}}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('subtipo_id', 'Subtipo', ['class'=>'form-control-label']) !!}
          {!! Form::select('subtipo_id', \App\Subtipo::pluck('nombre','id'), $modulo->subtipo_id, ['class'=>'form-control']) !!}
          {{-- <select name="subtipos[]" class="form-control" multiple title="Asignar subtipo" multiple="multiple" v-model="subtipos">
            <option v-for="(item, indice) in subtiposList" :value="item.value">@{{ item.label }}</option>
          </select> --}}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('categoria_id', 'Categoria', ['class'=>'form-control-label']) !!}
          {!! Form::select('categoria_id', \App\Categoria::pluck('nombre','id'), $modulo->categoria_id, ['class'=>'form-control']) !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
          {!! Form::text('nombre', $modulo->nombre, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('consecutivo', 'Consecutivo', ['class'=>'form-control-label']) !!}
          {!! Form::number('consecutivo', $modulo->consecutivo, ['class'=>'form-control']) !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          {!! Form::label('descripcion', 'Descripcion', ['class'=>'form-control-label']) !!}
          {!! Form::text('descripcion', $modulo->descripcion, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('varaintes', 'Variantes', ['class'=>'form-control-label']) !!}
          {!! Form::number('varaintes', $modulo->variantes, ['class'=>'form-control']) !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('sap', 'Sist. de Apertura', ['class'=>'form-control-label']) !!}
          {!! Form::select('sap', \App\Confpart::where('acronimo','=','sap')->pluck('valor','id'), $modulo->sap, ['class'=>'form-control','multiple']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('fondo_id', 'Tipo de Fondo', ['class'=>'form-control-label']) !!}
          {!! Form::select('fondo_id', \App\Confpart::where('acronimo','=','tf')->pluck('valor','id'), $modulo->fondo_id, ['class'=>'form-control','multiple']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('espesor_permitido', 'Espesor Permitido', ['class'=>'form-control-label']) !!}
          {!! Form::text('espesor_permitido', $modulo->espesor_permitido, ['class'=>'form-control']) !!}
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
        <div class="form-group mr-2">
          {!! Form::label('ancho_var', 'Ancho Var.', ['class'=>'form-control-label']) !!}
          {!! Form::number('ancho_var', $modulo->ancho_var, ['class'=>'form-control']) !!}
        </div>
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
        <div class="form-group mr-2">
          {!! Form::label('alto_var', 'Ancho Var.', ['class'=>'form-control-label']) !!}
          {!! Form::number('alto_var', $modulo->alto_var, ['class'=>'form-control']) !!}
        </div>
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
        <div class="form-group mr-2">
          {!! Form::label('profundidad_var', 'Ancho Var.', ['class'=>'form-control-label']) !!}
          {!! Form::number('profundidad_var', $modulo->profundidad_var, ['class'=>'form-control']) !!}
        </div>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/frontend/moduloslista') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection