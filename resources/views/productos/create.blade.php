@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md offset-1">
      <h4 class="text-primary">Productos <small class="text-secondary">Crear nuevo registro</small></h4>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md offset-1">
      {!! Form::open(['url'=>'productos','method'=>'POST']) !!}
      <div class="form-row">
        <div class="form-group mr-1">
          {!! Form::label('sku', 'SKU', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::text('sku', null, ['class'=>'form-control','placeholder'=>'Codigo SKU','v-model'=>'sku']) !!}
          <span class="text-danger"><small>@if ($errors->has('sku')) {{ $errors->first('sku') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('categoria_id', 'Categoria', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::select('categoria_id', \App\Categoria::pluck('nombre','id'), null, ['class'=>'form-control', 'placeholder'=>'Selección','v-model'=>'categoria_id']) !!}
          <span class="text-danger"><small>@if ($errors->has('categoria_id')) {{ $errors->first('categoria_id') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('subcategoria_id', 'Sub-Categoria', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::select('subcategoria_id', \App\Subcategoria::pluck('nombre','id'), null, ['class'=>'form-control', 'placeholder'=>'Selección','v-model'=>'subcategoria_id']) !!}
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
        <div class="form-group mr-1 mb-2">
          {!! Form::label('propiedades', 'Propiedades', ['class'=>'form-control-label font-weight-bold']) !!}
          <span class="text-danger font-weight-bold"><small><sup>*</sup> Defina la propiedades del Producto</small></span>
          <div class="form-row">
            <div class="form-group mr-1">
              {!! Form::number('largo', null, ['class'=>'form-control','placeholder'=>'LARGO','v-model'=>'propiedades.largo']) !!}
            </div>
            <div class="form-group mr-1">
              {!! Form::number('largoizq', null, ['class'=>'form-control','placeholder'=>'LARGO IZQ','v-model'=>'propiedades.largoizq']) !!}
            </div>
            <div class="form-group mr-1">
              {!! Form::number('largoder', null, ['class'=>'form-control','placeholder'=>'LARGO DER','v-model'=>'propiedades.largoder']) !!}
            </div>
          </div>
          <div class="form-row">
            <div class="form-group mr-1">
              {!! Form::number('ancho', null, ['class'=>'form-control','placeholder'=>'ANCHO','v-model'=>'propiedades.ancho']) !!}
            </div>
            <div class="form-group mr-1">
              {!! Form::number('anchosup', null, ['class'=>'form-control','placeholder'=>'ANCHO SUP','v-model'=>'propiedades.anchosup']) !!}
            </div>
            <div class="form-group mr-1">
              {!! Form::number('anchoinf', null, ['class'=>'form-control','placeholder'=>'ANCHO INF','v-model'=>'propiedades.anchoinf']) !!}
            </div>
          </div>
          <div class="form-row">
            <div class="form-group mr-1">
              {!! Form::number('area', null, ['class'=>'form-control','placeholder'=>'AREA','v-model'=>'propiedades.area']) !!}
            </div>
            <div class="form-group mr-1">
              {!! Form::number('espesor', null, ['class'=>'form-control','placeholder'=>'Espesor','v-model'=>'propiedades.espesor']) !!}
            </div>
          </div>
          <div class="form-row">
            <div class="form-group mr-1">
              {!! Form::number('mec1', null, ['class'=>'form-control','placeholder'=>'MEC1','v-model'=>'propiedades.mec1']) !!}
            </div>
            <div class="form-group mr-1">
              {!! Form::number('mec2', null, ['class'=>'form-control','placeholder'=>'MEC2','v-model'=>'propiedades.mec2']) !!}
            </div>
          </div>
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
    <div class="col-md">
      <pre>
        <p>
          Producto Tipo: @{{ producto_tipo }} <br>
          SKU: @{{ sku }} <br>
          Categoria ID: @{{ categoria_id }} <br>
          Sub Categoria: @{{ subcategoria_id }} <br>
          Tipo: @{{ tipo }} <br>
          Nombre: @{{ nombre }} <br>
          Descripción: @{{ descripcion }} <br>
          Unidad ID: @{{ unidad_id }} <br>
          Propiedades: @{{ propiedades }} <br>
          Importado: @{{ importado }} <br>
          Cant. MIN: @{{ min }} <br>
          Cant. MAX: @{{ max }} <br>
        </p>
      </pre>
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
      sku: '',
      categoria_id: '',
      subcategoria_id: '',
      tipo: '',
      nombre: '',
      descripcion: '',
      unidad_id: '',
      propiedades: [],
      importado: '',
      min: '',
      max: ''
    }
  })
</script>
@endsection