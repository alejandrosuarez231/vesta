@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md offset-1">
      <h4 class="text-primary">Productos <small class="text-secondary">Crear nuevo registro</small></h4>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-7 offset-1">
      {!! Form::open(['url'=>'productos','method'=>'POST']) !!}
      <div class="form-row">
        <div class="form-group mr-2">
          <label for="sku" class="form-control-label">SKU</label>
          <input class="form-control" type="text" name="sku" value="" placeholder="Codigo SKU" v-model="sku">
        </div>
        <div class="form-group mr-2">
          <label for="categoria_id" class="form-control-label">Categoria</label>
          <select class="form-control" name="categoria_id" v-model="categoria_id" @change="getSubcat">
            <option value="" disabled>Selección</option>
            <option v-for="cat in categorias" :value="cat.id">@{{ cat.nombre }}</option>
          </select>
        </div>
        <div class="form-group mr-2" v-if="subcategorias">
          <label for="subcategoria_id" class="form-control-label">Sub-Categoria</label>
          <select class="form-control" name="subcategoria_id" v-model="subcategoria_id">
            <option value="" disabled>Selección</option>
            <option v-for="subcat in subcategorias" :value="subcat.id">@{{ subcat.nombre }}</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="nombre">Producto/Nombre</label>
        <input class="form-control col-md-8" type="text" name="nombre" value="" placeholder="Nombre del Producto">
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="unidad_id">Unidad</label>
          <select name="unidad_id" v-model="unidad_id" class="form-control">
            <option value="" disabled>Selección</option>
            @foreach (\App\Unidad::pluck('acronimo','id') as $element => $value)
            <option value="{{ $element }}">{{ $value }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div v-if="tipo && unidad_id">
        <div>
          <p class="font-weight-bold">Definir Propiedades</p>
        </div>
        <div class="form-row"><!-- Largo -->
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="largo" v-on:click="vlargo = !vlargo">
            <label class="form-check-label" for="largo">Largo</label>
            <input class="form-control" type="text" name="largo" value="" placeholder="Largo" v-if="vlargo">
          </div>
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="largo_izq" v-on:click="vlargoizq = !vlargoizq">
            <label class="form-check-label" for="largo_izq">Largo IZQ</label>
            <input class="form-control" type="text" name="largoizq" value="" placeholder="Largo" v-if="vlargoizq">
          </div>
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="largo_der"  v-on:click="vlargoder = !vlargoder">
            <label class="form-check-label" for="largo_der">Largo DER</label>
            <input class="form-control" type="text" name="largoizq" value="" placeholder="Largo" v-if="vlargoder">
          </div>
        </div>
        <div class="form-row"><!-- Ancho -->
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="ancho">
            <label class="form-check-label" for="ancho">Ancho</label>
          </div>
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="ancho_sup">
            <label class="form-check-label" for="ancho_sup">Ancho SUP</label>
          </div>
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="ancho_inf">
            <label class="form-check-label" for="ancho_inf">Ancho INF</label>
          </div>
        </div>
        <div class="form-row"><!-- Otros A -->
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="alto">
            <label class="form-check-label" for="alto">Alto</label>
          </div>
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="profundidad">
            <label class="form-check-label" for="profundidad">Profundidad</label>
          </div>
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="area">
            <label class="form-check-label" for="area">Area</label>
          </div>
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="espesor">
            <label class="form-check-label" for="espesor">Espesor</label>
          </div>
        </div>
        <div class="form-row"><!-- Otros B -->
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="mec1">
            <label class="form-check-label" for="mec1">Mec1</label>
          </div>
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="mec2">
            <label class="form-check-label" for="mec2">Mec2</label>
          </div>
          <div class="form-check mr-3">
            <input type="checkbox" class="form-check-input" id="acabado">
            <label class="form-check-label" for="acabado">Acabado</label>
          </div>
        </div>
        <div class="form-group" v-if="tipo == 'PTO'">
          <label>Lista de Materiales</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt font-weight-bold"></i> Registrar</button>
      <a class="btn btn-warning" href="{{ url('/home') }}" title="Cancelar"><i class="fas fa-ban text-danger font-weight-bold"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
    <div class="col-md-4">

    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  var app = new Vue({
    el: '#app',

    created: function () {
      axios.get('/getCategorias')
      .then( response => {
        this.categorias = response.data;
      });
    },

    data: {
      sku: '',
      categorias: '',
      categoria_id: '',
      subcategorias: '',
      subcategoria_id: '',
      unidad_id: '',
      vlargo: false,
      vlargoizq: false,
      vlargoder: false,
    },

    computed: {
      tipo: function(){
        if(this.categoria_id){
          return this.categorias[this.categoria_id].tipo;
        }else {
          return null;
        }
      },
      skuc: function(){
        if(this.categoria_id){
          return this.categorias[this.categoria_id].acronimo;
        }else {
          return null;
        }
      },
      skusc: function(){
        if(this.subcategoria_id){
          return  this.subcategorias[this.subcategoria_id].acronimo;
        }else {
          return null;
        }
      },
      und: function(){
        if(this.categoria_id == 11 || this.categoria_id == 12){
          return this.unidad_id = 4;
        }
      }
    },

    methods: {
      getSubcat: function(){
        if(this.categoria_id){
          axios.get('/getSCatCodigo/' + this.categoria_id)
          .then( response => {
            this.subcategorias = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
        }
      }
    }
  });
</script>
@endsection