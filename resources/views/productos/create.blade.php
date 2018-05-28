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
      <div class="form-row my-3">
        <label for="" class="form-control-label font-weight-bold mr-4">Tipo de Producto: </label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="producto_tipo" id="producto_tipo1" value="option1" checked>
          <label class="form-check-label mr-2" for="producto_tipo1">
            <abbr title="Materia Prima" class="initialism">MT</abbr>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="producto_tipo" id="producto_tipo2" value="option2">
          <label class="form-check-label mr-2" for="producto_tipo2">
            <abbr title="Producto Semi Elaborado" class="initialism">PSE</abbr>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="producto_tipo" id="producto_tipo3" value="option3">
          <label class="form-check-label mr-2" for="exampleRadios3">
            <abbr title="Producto Terminado" class="initialism">PT</abbr>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="producto_tipo" id="producto_tipo3" value="option3">
          <label class="form-check-label mr-2" for="exampleRadios3">
            <abbr title="Servicio" class="initialism">S</abbr>
          </label>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-1">
          {!! Form::label('sku', 'SKU', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::text('sku', null, ['class'=>'form-control','placeholder'=>'Codigo SKU']) !!}
          <span class="text-danger"><small>@if ($errors->has('sku')) {{ $errors->first('sku') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('categoria_id', 'Categoria', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::select('categoria_id', \App\Categoria::pluck('nombre','id'), null, ['class'=>'form-control', 'placeholder'=>'Selección']) !!}
          <span class="text-danger"><small>@if ($errors->has('categoria_id')) {{ $errors->first('categoria_id') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('subcategoria_id', 'Sub-Categoria', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::select('subcategoria_id', \App\Subcategoria::pluck('nombre','id'), null, ['class'=>'form-control', 'placeholder'=>'Selección']) !!}
          <span class="text-danger"><small>@if ($errors->has('subcategoria_id')) {{ $errors->first('subcategoria_id') }} @endif</small></span>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-1">
          {!! Form::label('tipo', 'Tipo', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::text('tipo', null, ['class'=>'form-control','placeholder'=>'Tipo']) !!}
          <span class="text-danger"><small>@if ($errors->has('tipo')) {{ $errors->first('tipo') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre del Producto']) !!}
          <span class="text-danger"><small>@if ($errors->has('nombre')) {{ $errors->first('nombre') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('descripcion', 'Descripcion', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::textarea('descripcion', null, ['class'=>'form-control','size'=>'30x3','placeholder'=>'Descripción']) !!}
          <span class="text-danger"><small>@if ($errors->has('descripcion')) {{ $errors->first('descripcion') }} @endif</small></span>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-3">
          {!! Form::label('unidad_id', 'Unidad', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::select('unidad_id', \App\Unidad::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Selección']) !!}
          <span class="text-danger"><small>@if ($errors->has('unidad_id')) {{ $errors->first('unidad_id') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('propiedades', 'Propiedades', ['class'=>'form-control-label font-weight-bold']) !!}
          <button type="button" class="btn btn-success form-control" data-toggle="modal" title="Definir propiedades" data-target="#exampleModal"><i class="fas fa-cogs"></i> Definir</button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Propiedades</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group mr-1">
                      {!! Form::number('largo', null, ['class'=>'form-control','placeholder'=>'LARGO']) !!}
                    </div>
                    <div class="form-group mr-1">
                      {!! Form::number('largoizq', null, ['class'=>'form-control','placeholder'=>'LARGO IZQ']) !!}
                    </div>
                    <div class="form-group mr-1">
                      {!! Form::number('largoder', null, ['class'=>'form-control','placeholder'=>'LARGO DER']) !!}
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group mr-1">
                      {!! Form::number('ancho', null, ['class'=>'form-control','placeholder'=>'ANCHO']) !!}
                    </div>
                    <div class="form-group mr-1">
                      {!! Form::number('anchosup', null, ['class'=>'form-control','placeholder'=>'ANCHO SUP']) !!}
                    </div>
                    <div class="form-group mr-1">
                      {!! Form::number('anchoinf', null, ['class'=>'form-control','placeholder'=>'ANCHO INF']) !!}
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group mr-1">
                      {!! Form::number('area', null, ['class'=>'form-control','placeholder'=>'AREA']) !!}
                    </div>
                    <div class="form-group mr-1">
                      {!! Form::number('espesor', null, ['class'=>'form-control','placeholder'=>'Espesor']) !!}
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group mr-1">
                      {!! Form::number('mec1', null, ['class'=>'form-control','placeholder'=>'MEC1']) !!}
                    </div>
                    <div class="form-group mr-1">
                      {!! Form::number('mec2', null, ['class'=>'form-control','placeholder'=>'MEC2']) !!}
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-1">
          {!! Form::label('largo', 'Largo', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::number('largo', null, ['class'=>'form-control','step'=>'any', 'placeholder'=>'0.00']) !!}
          <span class="text-danger"><small>@if ($errors->has('largo')) {{ $errors->first('largo') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('ancho', 'Ancho', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::number('ancho', null, ['class'=>'form-control','step'=>'any', 'placeholder'=>'0.00']) !!}
          <span class="text-danger"><small>@if ($errors->has('ancho')) {{ $errors->first('ancho') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('area', 'Área', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::number('area', null, ['class'=>'form-control','step'=>'any', 'placeholder'=>'0.00']) !!}
          <span class="text-danger"><small>@if ($errors->has('area')) {{ $errors->first('area') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('espesor', 'Espesor', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::number('espesor', null, ['class'=>'form-control','step'=>'any', 'placeholder'=>'0.00']) !!}
          <span class="text-danger"><small>@if ($errors->has('espesor')) {{ $errors->first('espesor') }} @endif</small></span>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-1">
          {!! Form::label('importado', 'Importado', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::select('importado', [0=>'No',1=>'Si'], null, ['class'=>'form-control','placeholder'=>'Selección']) !!}
          <span class="text-danger"><small>@if ($errors->has('importado')) {{ $errors->first('importado') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('min', 'Existencia Mínima', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::number('min', null, ['class'=>'form-control','placeholder'=>'1']) !!}
          <span class="text-danger"><small>@if ($errors->has('min')) {{ $errors->first('min') }} @endif</small></span>
        </div>
        <div class="form-group mr-1">
          {!! Form::label('max', 'Existencia Máxima', ['class'=>'form-control-label font-weight-bold']) !!}
          {!! Form::number('max', null, ['class'=>'form-control','placeholder'=>'100']) !!}
          <span class="text-danger"><small>@if ($errors->has('max')) {{ $errors->first('max') }} @endif</small></span>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt font-weight-bold"></i> Registrar</button>
      <a class="btn btn-warning" href="{{ url('/home') }}" title="Cancelar"><i class="fas fa-ban text-danger font-weight-bold"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection