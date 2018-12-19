@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 offset-md-2">
      <h4>Editar Codigo</h4>

      {!! Form::model($codigo, ['route' => ['codigos.update', $codigo->id]]) !!}
      {{-- <form method="POST" v-on:submit.prevent="crearCodigo"> --}}
        <div class="form-row">
          <div class="form-group mr-3">
            {!! Form::label('tipo', 'Tipo', ['class'=>'form-control-label']) !!}
            <select name="tipo" class="form-control" v-model="tipo" @change="getCategorias">
              <option disabled value="">Selección</option>
              <option value="MTP">MTP</option>
              <option value="PSE">PSE</option>
              <option value="PTE">PTE</option>
              <option value="SER">SER</option>
            </select>
            <span v-for="error in errors" class="text-danger">@{{ error.tipo }}</span>
          </div>
          <div class="form-group mr-3">
            {!! Form::label('categoria_id', 'Categoria', ['class'=>'form-control-label']) !!}
            <select name="categoria_id" v-model="categoria_id" class="form-control" @change="getSubcategorias">
              <option disabled value="">Selección</option>
              <option v-for="option in categorias" v-bind:value="option.value">@{{ option.label }}</option>
            </select>
            <span v-for="error in errors" class="text-danger">@{{ error.categoria_id }}</span>
          </div>
          <div class="form-group mr-3">
            {!! Form::label('subcategoria_id', 'Sub-Categoria', ['class'=>'form-control-label']) !!}
            <select name="subcategoria_id" v-model="subcategoria_id" class="form-control">
              <option disabled value="">Selección</option>
              <option v-for="option in subcategorias" v-bind:value="option.value">@{{ option.label }}</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          {!! Form::label('acronimo', 'Acronimo', ['class'=>'form-control-label']) !!}
          <input type="text" name="acronimo" value="" v-model="acronimo" placeholder="Acronimo" class="form-control text-uppercase col-md-4">
          <span v-for="error in errors" class="text-danger">@{{ error.acronimo }}</span>
        </div>
        <div class="form-group">
          {!! Form::label('tipologia', 'Tipologia', ['class'=>'form-control-label']) !!}
          <input type="text" name="tipologia" value="" v-model="tipologia" placeholder="Tipologia" class="form-control col-md-4">
          <span v-for="error in errors" class="text-danger">@{{ error.tipologia }}</span>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
        <a class="btn btn-warning text-danger" href="{{ route('codigos.index') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {{-- </form> --}}
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
      tipo: '{{ $codigo->tipo }}',
      categorias: [],
      categoria_id: '{{ $codigo->categoria_id }}',
      subcategorias: [],
      subcategoria_id: '{{ $codigo->subcategoria_id }}',
      acronimo: '{{ $codigo->acronimo }}',
      tipologia: '{{ $codigo->tipologia }}',
      errors: []
    },
    methods: {
      getCategorias: function() {
        axios.get('/categoria/' + this.tipo)
        .then( response => {
          this.categorias = response.data;
        })
      },
      getSubcategorias: function() {
        axios.get('/subcategoria/' + this.categoria_id)
        .then( response => {
          this.subcategorias = response.data;
        })
      },
      crearCodigo: function() {
        var url = '/codigos';
        axios.post(url, {
          tipo: this.tipo,
          categoria_id: this.categoria_id,
          subcategoria_id: this.subcategoria_id,
          acronimo: this.acronimo,
          tipologia: this.tipologia
        }).then(response => {
          this.tipo = '';
          this.categoria_id = '';
          this.subcategoria_id = '';
          this.acronimo = '';
          this.tipologia = '';
          this.errors = [];
          swal({
            position: 'top-end',
            type: 'success',
            title: 'Codigo creado con éxito!',
            showConfirmButton: false,
            timer: 1500
          });
        }).catch(error => {
          this.errors = error.response.data;
          console.log(error.response.data);
        })
      }
    }
  })
</script>
@endsection