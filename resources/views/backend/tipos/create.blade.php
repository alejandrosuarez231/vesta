@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 offset-md-2">
      <h4>Tipos <small>Nueva</small></h4>
      {!! Form::open(['route'=>'tipos.store','method'=>'POST']) !!}
      <div class="form-group col-md-6">
        {!! Form::label('tipo', 'Tipo', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::select('tipologia', ['MTP'=>'MTP','PSE'=>'PSE','PTO'=>'PTO','SER'=>'SER'], null, ['class'=>'form-control','placeholder'=>'Selección','v-model'=>'tipologia','@change'=>'setAcromtip']) !!}
        {!! $errors->first('tipologia', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-check col-md-8">
        {!! Form::label('padre', 'Contiene Sub-Tipos', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::checkbox('padre', 1, true); !!}
        {!! $errors->first('padre', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group col-md-8">
        {!! Form::label('acromtip', 'Acro. Tipo', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('acromtip', null, ['class'=>'form-control','v-model'=>'acromtip']) !!}
        {!! $errors->first('acromtip', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group col-md-8">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        {!! $errors->first('nombre', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group col-md-8">
        {!! Form::label('acronimo', 'Acronimo', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('acronimo', null, ['class'=>'form-control text-uppercase']) !!}
        {!! $errors->first('acronimo', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/tipos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  var app = new Vue({
    el: '#app',

    data: {
      tipologia: '',
      acromtip: ''
    },

    methods: {
      setAcromtip: function(){
        switch(this.tipologia){
          case 'MTP':
          this.acromtip = 'M'
          break;
          case 'PSE':
          this.acromtip = 'S'
          break;
          case 'PTO':
          this.acromtip = 'T'
          break;
          case 'SER':
          this.acromtip = ''
          break;
        }
      }
    }
  })
</script>
@endsection