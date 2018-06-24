@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Proveedores <small>Editar</small></h4>
      {!! Form::model($proveedor, ['route' => ['proveedores.update', $proveedor->id],'method'=>'PATCH']) !!}
      <div class="form-group">
        {!! Form::label('fiscalid', 'Fiscal ID', ['class'=>'form-control-label']) !!}
        {!! Form::text('fiscalid', $proveedor->fiscalid, ['class'=>'form-control col-md-4','placeholder'=>'RUC']) !!}
        {!! $errors->first('fiscalid', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', $proveedor->nombre, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Proveedor']) !!}
        {!! $errors->first('nombre', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group">
        {!! Form::label('direccion', 'Dirección', ['class'=>'form-control-label']) !!}
        {!! Form::textarea('direccion', $proveedor->direccion, ['class'=>'form-control col-md-4','size'=>'30x3','placeholder'=>'Dirección']) !!}
        {!! $errors->first('direccion', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group">
        {!! Form::label('telefonos', 'Telefonos', ['class'=>'form-control-label']) !!}
        {!! Form::text('telefonos', $proveedor->telefonos, ['class'=>'form-control col-md-4','placeholder'=>'Telefonos']) !!}
        {!! $errors->first('telefonos', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group">
        {!! Form::label('email', 'Email', ['class'=>'form-control-label']) !!}
        {!! Form::email('email', $proveedor->email, ['class'=>'form-control col-md-4','placeholder'=>'email de la Proveedor']) !!}
        {!! $errors->first('email', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group">
        {!! Form::label('website', 'Pagina Web', ['class'=>'form-control-label']) !!}
        {!! Form::text('website', $proveedor->website, ['class'=>'form-control col-md-4','placeholder'=>'URL WEB']) !!}
        {!! $errors->first('website', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group">
        {!! Form::label('credito', 'Credito', ['class'=>'form-control-label']) !!}
        {!! Form::number('credito', $proveedore->credtio, ['class'=>'form-control col-md-4','placeholder'=>'Credito']) !!}
        {!! $errors->first('credito', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt"></i> Actualizar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/proveedores') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection