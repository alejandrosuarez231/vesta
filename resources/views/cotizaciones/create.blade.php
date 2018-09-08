@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md offset-md-1">
      <h3>Cotizar</h3>
    </div>
  </div>
  {!! Form::open() !!}
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cliente</h5>
          <div class="form-group">
            {!! Form::label('cliente_id', 'Cliente', ['class'=>'form-control-label']) !!}
            {!! Form::select('cliente_id', [], null, ['class'=>'form-control','placeholder'=>'Seleccion Cliente']) !!}
            <span><small>Información del cliente.</small></span>
          </div>
          <button type="button" class="btn btn-sm btn-primary">Cargar Cotización</button>
        </div>
      </div>
    </div>
    <div class="col-md-9">

      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Tipologia</h6>
              <div class="form-group mt-2 mr-2">
                {!! Form::select('tipo_id', \App\Tipo::where('tipologia','=','PTO')->pluck('nombre','id'), null, ['class' => 'form-control form-control-sm','placeholder'=>'Indique el Tipo','v-model' => 'tipo']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                <select class="form-control form-control-sm" name="subtipo_id" v-model="subtipo">
                  <option value="" disabled>Indique el SubTipo</option>
                  <option v-for="(item, index) in subtipos" :value="item.value">@{{ item.label }}</option>
                </select>
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::select('sap', \App\Confpart::where('acronimo','=','sap')->pluck('valor','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'Sist. de Apertura']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::select('sar', \App\Confpart::where('acronimo','=','sar')->pluck('valor','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'Sist. de Armado']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                <select name="modulo" class="form-control form-control-sm" v-model="modulo">
                  <option value="" disabled>Indique el Modulo</option>
                  <option v-for="item in modulosList" :value="item.value">@{{ item.label + ' | ' + item.sap }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Propiedades</h6>
              <div class="form-group mt-2 mr-2">
                {!! Form::text('ancho', null, ['class' => 'form-control form-control-sm','placeholder'=>'Ancho']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::text('alto', null, ['class' => 'form-control form-control-sm','placeholder'=>'Alto']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::text('profundidad', null, ['class' => 'form-control form-control-sm','placeholder'=>'Profundidad']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                <select class="form-control form-control-sm" name="tipo_gaveta" >
                  <option value="" disabled selected>Tipo Gaveta</option>
                </select>
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::select('tipo_bisagra', \App\Producto::where('tipo_id',1)->whereIn('subtipo_id',[1,2,3,4])->pluck('nombre','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'Tipo de Bisagra']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::select('tirador', \App\Producto::where('tipo_id',9)->where('subtipo_id',37)->pluck('nombre','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'Tirador']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                <select class="form-control form-control-sm" name="posicion_tirador" >
                  <option value="" disabled selected>Tirador posición</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Materiales</h6>
              <div class="form-group mt-2 mr-2">
                {!! Form::number('espesor_caja', null, ['class' => 'form-control form-control-sm','placeholder' => 'Espesor Caja']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::number('espesor_frente', null, ['class' => 'form-control form-control-sm','placeholder' => 'Espesor Frente']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::number('espesor_fondo', null, ['class' => 'form-control form-control-sm','placeholder' => 'Espesor Fondo']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                <select class="form-control form-control-sm" name="material_caja">
                  <option value="" disabled selected>Material Caja</option>
                </select>
              </div>
              <div class="form-group mt-2 mr-2">
                <select class="form-control form-control-sm" name="material_frente">
                  <option value="" disabled selected>Material Frente</option>
                </select>
              </div>
              <div class="form-group mt-2 mr-2">
                <select class="form-control form-control-sm" name="material_fondo">
                  <option value="" disabled selected>Material Fondo</option>
                </select>
              </div>
              <div class="form-group mt-2 mr-2">
                <select class="form-control form-control-sm" name="material_gaveta">
                  <option value="" disabled selected>Material Gaveta</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Categoria</h6>
              <div class="form-group mt-2 mr-2">
                {!! Form::select('banda', ['-1'=>'Crear Categoria', '1'=>'Categoria 1', '2'=>'Categoria 2'], null, ['class'=>'form-control form-control-sm','v-model'=>'banda','placeholder'=>'Inidique la Categoria']) !!}
              </div>
              <div class="form-group mt-2 mr-2" v-if="banda == -1 ">
                {!! Form::text('nuevabanda', null, ['class'=>'form-control form-control-sm','placeholder'=>'Nueva Banda']) !!}
              </div>
            </div>
          </div>
          <div class="form-group mt-2 mr-2">
            <button type="button" class="btn btn-sm btn-primary" @click="getMaterial()">Añadir Modulo</button>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="row mt-2">
    <div class="col-md">
      <table class="table">
        <caption>Modulos</caption>
        <thead>
          <tr>
            <th>SKU</th>
            <th>SKU <small>Comercial</small></th>
            <th>Tipo</th>
            <th>Subtipo</th>
            <th>Nombre</th>
            <th>Sist. de Apertura</th>
            <th>Sist. de Armado</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in modulos" track-by="index">
            <td>@{{ item.sku }}</td>
            <td>@{{ item.skucomercial }}</td>
            <td>@{{ item.tipo }}</td>
            <td>@{{ item.subtipo }}</td>
            <td>@{{ item.nombre }}</td>
            <td>@{{ item.sap }}</td>
            <td>@{{ item.sar }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <div class="row mt-2">
    <div class="col-md">
      <table class="table">
        <caption>Complementos y Piezas</caption>
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Codigo/Padre</th>
            <th>Descripción</th>
            <th>Categoria</th>
            <th>Bisagras</th>
            <th>Gavetas</th>
            <th>Tirador</th>
            <th>Posición</th>
            <th>Alto</th>
            <th>Ancho</th>
            <th>Profundidad</th>
            <th>Cantidad</th>
            <th>Precio/Unid</th>
            <th>Subtotal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(material, indice) in materiales" track-by="indice">
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td><a class="btn btn-link text-danger" href="#" title="Eliminar" @click="removeRowMAT(indice)" v-if="materiales.length > 1"><i class="fas fa-minus"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var app = new Vue({
    el: '#app',

    data: {
      tipo: '',
      subtipos: '',
      subtipo: '',
      modulo: '',
      modulosList: [],
      modulos: [],
      materiales: [],
      banda: ''
    },

    watch: {
      tipo: function(){
        if(this.tipo > 0){
          axios.get('/subtipos/' + this.tipo)
          .then( response => {
            this.subtipos = response.data;
          })
        }
      }
    },

    methods: {
      getModulos: function(){
        axios.get('/getModulos/' + this.tipo + '/' + this.subtipo)
        .then( response => {
          this.modulosList = response.data
        })
        .catch( function(error) {
          console.log(error)
        })
      },
      getMaterial: function() {
        axios.get('/getMaterial/' + this.modulo)
        .then( response => {
          // console.log(response.data)
          this.modulos.push(response.data[0])
        })
        .catch( function(error) {
          console.log(error)
        })
      }
    },

  })
</script>
@endsection