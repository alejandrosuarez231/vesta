@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Orden de Compra <small>Detalles</small></h4>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md offset-2">
      {!! Form::open() !!}
      <div class="form-group">
        {!! Form::label('ordendecompra_id', 'Orden de Compra', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('ordendecompra_id', null, ['class'=>'form-control-plaintext']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection