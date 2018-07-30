@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid">
  <div class="row">
    <div class="col-md-8 offset-md-1">
      <h3>Asignar Propiedades Extras</h3>
      {!! Form::open(['route' => 'extras.setting', 'method' => 'POST','ref'=>'form']) !!}
      <div class="form-group">
        {!! Form::label('extra_id', 'Prop Extra', ['class' => 'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control-plaintext font-weight-bold lead','readonly','v-model' => 'extra']) !!}
        {!! Form::hidden('extra_id', $extra->first()->id, []) !!}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('tipo_id', 'Tipo', ['class'=>'form-control-label']) !!}
          {!! Form::select('tipo_id', \App\Tipo::where('tipologia','=','MTP')->pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Selección','v-model' => 'tipo','@change'=>'getSubtipo']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('subtipo_id', 'SubTipo', ['class'=>'form-control-label']) !!}
          <select name="subtipo_id" class="form-control" v-model='subtipo'>
            <option value="" selected disabled>Selección</option>
            <option v-for="(item,index) in subtiposList" :value="index">@{{ item }}</option>
          </select>
        </div>
      </div>
      {!! Form::submit('Asignar', ['class'=>'btn btn-primary']) !!}
      {{-- <button type="button" class="btn btn-primary" @click="submit">Asignar</button> --}}
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var app = new Vue({
    el: '#app',
    data: {
      tipo: '',
      subtiposList: '',
      subtipo: '',
      extra: '{{ $extra->first()->propiedad }}',
      extra_id: '{{ $extra->first()->id }}'
    },
    methods: {
      getSubtipo: function() {
        axios.get('/subtipos/' + this.tipo)
        .then( response => {
          this.subtiposList = response.data;
          console.log(response.data);
        })
      },
      submit : function(){
        this.$refs.form.submit()
      }
    }
  })
</script>
@endsection