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
            <select name="cliente_id" class="form-control form-control-sm">
              <option disabled selected value="">Clientes</option>
            </select>
            <span><small>Información del cliente.</small></span>
          </div>
          <button type="button" class="btn btn-sm btn-primary">Cargar Cotización</button>
          <button type="button" class="btn btn-sm btn-success" @click="addSKU()">Añadir Modulo</button>
        </div>
      </div>
    </div>
    <div class="col-md-9">

      <div class="row">
        <div class="col-md">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Tipologia</h6>
              <div class="form-group mt-2 mr-2">
                {!! Form::select('tipo_id', \App\Tipo::where('tipologia','=','PTO')->pluck('nombre','id'), null, ['class' => 'form-control form-control-sm','placeholder'=>'Indique el Tipo','v-model' => 'tipo_id','@change' => 'getSkuPadre()']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                <select class="form-control form-control-sm" name="subtipo_id" v-model="subtipo_id" @change="getSkuPadre()">
                  <option value="" disabled>Indique el SubTipo</option>
                  <option v-for="(item, index) in subtipo_list" :value="item.value">@{{ item.label }}</option>
                </select>
              </div>
              <div class="group mt-2 mr-2">
                <select class="form-control form-control-sm" name="categoria_id" v-model="categoria_id" @change="getSkuPadre()">
                  <option value="" disabled>Indique el Categoria</option>
                  <option v-for="(item, index) in categoria_list" :value="item.value">@{{ item.label }}</option>
                </select>
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::select('sap_id', \App\Sap::pluck('valor','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'Sist. de Apertura','v-model' => 'sap_id','@change'=>'getSkuPadre()']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::select('fondo_id', \App\Fondo::pluck('valor','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'Fondos', 'v-model' => 'fondo_id','@change'=>'getSkuPadre()']) !!}
              </div>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Propiedades</h6>

              <div class="form-row">
                <div class="form-group col-md-4">
                  {!! Form::text('ancho', null, ['class' => 'form-control form-control-sm','placeholder'=>'Ancho', 'v-model' => 'ancho']) !!}
                </div>
                <div class="form-group col-md-4">
                  {!! Form::text('alto', null, ['class' => 'form-control form-control-sm','placeholder'=>'Alto', 'v-model' => 'alto']) !!}
                </div>
                <div class="form-group col-md-4">
                  {!! Form::text('profundidad', null, ['class' => 'form-control form-control-sm','placeholder'=>'Profundidad', 'v-model' => 'profundidad']) !!}
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md">
                  <select class="form-control form-control-sm" name="tipo_gaveta">
                    <option value="" disabled selected>Tipo Gaveta</option>
                    {{-- <option v-for="item in gavetas" :value="item.value">@{{ item.label }}</option> --}}
                  </select>
                </div>
                <div class="form-group col-md">
                  <select class="form-control form-control-sm" name="tipo_gaveta_prop">
                    <option value="" disabled selected>Pro/Ext</option>
                    <option value="1">Con Freno</option>
                    <option value="2">Sin Freno</option>
                  </select>
                </div>
                <div class="form-group col-md">
                  {!! Form::select('marca_corredera', \App\Marca::pluck('nombre','id'), null, ['class'=>'form-control-sm form-control','placeholder'=>'Marca Coredera']) !!}
                  {{-- <select name="" class="form-control form-control-sm">
                    <option value="" disabled selected>Marca</option>
                    <option v-for="item in MarcasGavList" :value="item.value">@{{ item.label }}</option>
                  </select> --}}
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md">
                  <select class="form-control form-control-sm" name="tipo_bisagra">
                    <option value="" disabled selected>Tipo Bisagras</option>
                    {{-- <option v-for="item in bisagras" :value="item.value">@{{ item.label }}</option> --}}
                  </select>
                </div>
                <div class="form-group col-md">
                  <select class="form-control form-control-sm" name="bisagra_tipo_prop">
                    <option value="" disabled selected>Pro/Ext</option>
                    <option value="1">Con Freno</option>
                    <option value="2">Sin Freno</option>
                  </select>
                </div>
                <div class="form-group col-md">
                  {!! Form::select('marca_bisagra', \App\Marca::pluck('nombre','id'), null, ['class'=>'form-control-sm form-control','placeholder'=>'Marca Bisagra']) !!}
                  {{-- <select name="" class="form-control form-control-sm">
                    <option value="" disabled selected>Marca</option>
                    <option v-for="item in MarcasBisList" :value="item.value">@{{ item.label }}</option>
                  </select> --}}
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <select class="form-control form-control-sm" name="tirador">
                    <option value="" disabled selected>Tirador</option>
                    {{-- <option v-for="item in tiradores" :value="item.value">@{{ item.label }}</option> --}}
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <select class="form-control form-control-sm" name="posicion_tirador" >
                    <option value="" disabled selected>Tirador posición</option>
                    <option value="1">Central Superior</option>
                    <option value="2">Exterior Superior</option>
                    <option value="3">Exterior Medio</option>
                    <option value="4">Exterior Inferior</option>
                  </select>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Materiales</h6>
              <div class="form-group mr-2">
                {!! Form::number('espesor_caja', null, ['class' => 'form-control form-control-sm','placeholder' => 'Espesor Caja']) !!}
              </div>
              <div class="form-group mr-2">
                {!! Form::number('espesor_frente', null, ['class' => 'form-control form-control-sm','placeholder' => 'Espesor Frente']) !!}
              </div>
              <div class="form-group mr-2">
                {!! Form::number('espesor_fondo', null, ['class' => 'form-control form-control-sm','placeholder' => 'Espesor Fondo']) !!}
              </div>
              <div class="form-group mr-2">
                {!! Form::select('material_caja', \App\Tablero::with('colore')->get()->pluck('colore.nombre','id'), null, ['class'=>'form-control-sm form-control
                ','placeholder'=>'Material Caja']) !!}
                {{-- <select name="material_caja" class="form-control form-control-sm" >
                  <option disabled selected value="">Material Caja</option>
                  <option v-for="item in matcaja" :value="item.value">@{{ item.label }}</option>
                </select> --}}
              </div>
              <div class="form-group mr-2">
                {!! Form::select('material_frente', \App\Tablero::with('colore')->get()->pluck('colore.nombre','id'), null, ['class'=>'form-control-sm form-control
                ','placeholder'=>'Material Frente']) !!}
                {{-- <select name="material_frente" class="form-control form-control-sm" >
                  <option disabled selected value="">Material Frente</option>
                  <option v-for="item in matfrente" :value="item.value">@{{ item.label }}</option>
                </select> --}}
              </div>
              <div class="form-group mr-2">
                {!! Form::select('material_fondo', \App\Tablero::with('colore')->get()->pluck('colore.nombre','id'), null, ['class'=>'form-control-sm form-control
                ','placeholder'=>'Material Fondo']) !!}
                {{-- <select name="material_fondo" class="form-control form-control-sm" >
                  <option disabled selected value="">Material Fondo</option>
                  <option v-for="item in matfondo" :value="item.value">@{{ item.label }}</option>
                </select> --}}
              </div>
              <div class="form-group mr-2">
                {!! Form::select('material_gaveta', \App\Tablero::with('colore')->get()->pluck('colore.nombre','id'), null, ['class'=>'form-control-sm form-control
                ','placeholder'=>'Material Gaveta']) !!}
                {{-- <select name="material_gaveta" class="form-control form-control-sm" >
                  <option disabled selected value="">Material Gaveta</option>
                  <option v-for="item in matgaveta" :value="item.value">@{{ item.label }}</option>
                </select> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-2" {{-- v-if="skus.length > 0" --}}>
    <div class="col-md">
      <table class="table table-bordered table-inverse table-hover">
        <caption>SKU's</caption>
        <thead>
          <tr>
            <th>SKU</th>
            <th>Tipo</th>
            <th>Subtipo</th>
            <th>Categoria</th>
            <th>SAP</th>
            <th>Fondo</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(sku, index) in skus" track-by="index">
            <td>@{{ sku.sku_padre }}</td>
            <td>@{{ sku.tipo.nombre }}</td>
            <td>@{{ sku.subtipo.nombre }}</td>
            <td>@{{ sku.categoria.nombre }}</td>
            <td>@{{ sku.sap.valor }}</td>
            <td>@{{ sku.fondo.valor }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row mt-2" {{-- v-if="piezas.length > 0" --}}>
    <div class="col-md">
      <table class="table table-bordered table-inverse table-hover">
        <caption>Piezas</caption>
        <thead>
          <tr>
            <th>Pieza</th>
            <th>Material</th>
            <th>Descripcion</th>
            <th>Largo</th>
            <th class="text-center">VL</th>
            <th>L-Sup</th>
            <th class="text-center">VLS</th>
            <th>L-Inf</th>
            <th class="text-center">VLI</th>
            <th>Ancho</th>
            <th class="text-center">VA</th>
            <th>A-Izq</th>
            <th class="text-center">VAI</th>
            <th>A-Der</th>
            <th class="text-center">VAD</th>
            <th>Mec 1</th>
            <th class="text-center">Valor</th>
            <th>Mec 2</th>
            <th class="text-center">Valor</th>
            <th class="text-right">Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(pieza, index) in piezas" track-by="index">
            <td>@{{ pieza.pieza.tipo_pieza }}</td>
            <td>@{{ pieza.materiale.nombre }}</td>
            <td>@{{ pieza.descripcion }}</td>
            <td class="text-right">@{{ pieza.largo }}</td>
            <td class="text-right">@{{ pieza.vl }}</td>
            <td class="text-right">@{{ pieza.largo_sup }}</td>
            <td class="text-right">@{{ pieza.vls }}</td>
            <td class="text-right">@{{ pieza.largo_inf }}</td>
            <td class="text-right">@{{ pieza.vli }}</td>
            <td class="text-right">@{{ pieza.ancho }}</td>
            <td class="text-right">@{{ pieza.va }}</td>
            <td class="text-right">@{{ pieza.ancho_izq }}</td>
            <td class="text-right">@{{ pieza.vai }}</td>
            <td class="text-right">@{{ pieza.ancho_der }}</td>
            <td class="text-right">@{{ pieza.vad }}</td>
            <td class="text-right">@{{ pieza.mecanizado1 }}</td>
            <td class="text-right">@{{ pieza.vm1 }}</td>
            <td class="text-right">@{{ pieza.mecanizado2 }}</td>
            <td class="text-right">@{{ pieza.vm2 }}</td>
            <td class="text-right">@{{ pieza.cantidad }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <div class="row mt-2" {{-- v-if="complementos.length > 0" --}}>
    <div class="col-md">
      <table class="table table-bordered table-inverse table-hover">
        <caption>Complementos</caption>
        <thead>
          <tr>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th class="text-right">Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(complemento, index) in complementos" track-by="index">
            <td>@{{ complemento.categoria.nombre }}</td>
            <td>@{{ complemento.descripcion }}</td>
            <td class="text-right">@{{ complemento.cantidad }}</td>
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

    created(){

    },

    data: {
      tipo_id: '',
      subtipo_id: '',
      categoria_id: '',
      sap_id: '',
      fondo_id: '',
      sku_padre_id: '',
      skus: [],
      skulistado_id: '',
      subtipo_list: '',
      categoria_list: '',
      piezas: [],
      complementos: [],
      ancho: '',
      alto: '',
      profundidad: '',
      vl: [],
    },

    computed: {},

    watch: {
      tipo_id(){
        if(this.tipo_id){
          axios.get('/subtiposFiltro/' + this.tipo_id)
          .then( response => {
            // console.log('Subtipo Resquest code 200');
            this.subtipo_list = response.data
          })
          .catch( function(error) {
            console.log(error);
          });
        }
      },
      subtipo_id(){
        if (this.subtipo_id) {
          axios.get('/categoriasFiltro/' + this.subtipo_id)
          .then( response => {
            // console.log('Categoria Resquest code 200');
            this.categoria_list = response.data;
          })
          .catch(function(error){
            console.log(error)
          })
        }
      },
      ancho: function(){
        if(this.piezas.length > 0 && this.ancho){
          for (var i = 0; i < this.piezas.length; i++) {

            if(this.piezas[i].largo !== null && this.piezas[i].largo.split("").length > 1){
              this.piezas[i].vl = this.piezas[i].largo.split("A").join(this.ancho);
            }else if(this.piezas[i].largo !== null && this.piezas[i].largo.split("").length == 1) {
              this.piezas[i].vl = this.piezas[i].largo.replace("A", this.ancho);
            }

            if(this.piezas[i].largo_sup !== null && this.piezas[i].largo_sup.split("").length > 1){
              this.piezas[i].vls = this.piezas[i].largo_sup.split("A").join(this.ancho);
            }else if(this.piezas[i].largo_sup !== null && this.piezas[i].largo_sup.split("").length == 1) {
              this.piezas[i].vls = this.piezas[i].largo_sup.replace("A", this.ancho);
            }

            if(this.piezas[i].largo_inf !== null && this.piezas[i].largo_inf.split("").length > 1){
              this.piezas[i].vli = this.piezas[i].largo_inf.split("A").join(this.ancho);
            }else if(this.piezas[i].largo_inf !== null && this.piezas[i].largo_inf.split("").length == 1) {
              this.piezas[i].vli = this.piezas[i].largo_inf.replace("A", this.ancho);
            }

            if(this.piezas[i].ancho !== null && this.piezas[i].ancho.split("").length > 1){
              this.piezas[i].va = this.piezas[i].ancho.split("A").join(this.ancho);
            }else if(this.piezas[i].ancho !== null && this.piezas[i].ancho.split("").length == 1) {
              this.piezas[i].va = this.piezas[i].ancho.replace("A", this.ancho);
            }
            if(this.piezas[i].ancho_izq !== null && this.piezas[i].ancho_izq.split("").length > 1){
              this.piezas[i].vai = this.piezas[i].ancho_izq.split("A").join(this.ancho);
            }else if(this.piezas[i].ancho_izq !== null && this.piezas[i].ancho_izq.split("").length == 1) {
              this.piezas[i].vai = this.piezas[i].ancho_izq.replace("A", this.ancho);
            }

            if(this.piezas[i].ancho_der !== null && this.piezas[i].ancho_der.split("").length > 1){
              this.piezas[i].vad = this.piezas[i].ancho_der.split("A").join(this.ancho);
            }else if(this.piezas[i].ancho_der !== null && this.piezas[i].ancho_der.split("").length == 1) {
              this.piezas[i].vad = this.piezas[i].ancho_der.replace("A", this.ancho);
            }

          }
        }
      },
      alto: function(){
        if(this.piezas.length > 0 && this.ancho && this.alto){
          for (var i = 0; i < this.piezas.length; i++) {
            if(this.piezas[i].vl && this.piezas[i].vl !== null && this.piezas[i].vl.length > 1){
              if(this.piezas[i].vl.search("H") > -1){
                console.log(this.piezas[i].vl.search("H"));
              }
            }
          }
        }
      }
    },

    methods: {
      getSkuPadre: function(index){
        if(this.tipo_id && this.subtipo_id && this.categoria_id && this.sap_id && this.fondo_id){
          var uid = this.tipo_id + this.subtipo_id + this.categoria_id + this.sap_id + this.fondo_id;
          // console.log(uid);
          axios.get('/getSkuPadre/' + uid)
          .then( response => {
            this.skulistado_id = response.data;
            if(this.skulistado_id == 0){
              Swal({
                type: 'error',
                title: 'Oops...',
                text: 'SKU Padre no encontrado!',
                footer: '<a href>Esta seguro que existe?</a>'
              })
              this.tipo_id = null;
              this.subtipo_id = null;
              this.categoria_id = null;
              this.sap_id = null;
              this.fondo_id = null;
            }
          })
          .catch(function(error){
            console.log(error)
          })
        }
      },
      addSKU: function(){
        // console.log(this.skulistado_id);
        /* SKU */
        axios.get('/showSkuPadre/' + this.skulistado_id)
        .then(response => {
          this.skus.push(response.data);
        })
        .catch(function(error){
          console.log(error)
        })
        /* Piezas */
        axios.get('/piezasSkuPadre/' + this.skulistado_id)
        .then( response => {
          for (var i = 0; i < response.data.length; i++) {
            this.piezas.push(response.data[i]);
          }
        })
        .catch(function(error){
          console.log(error)
        })
        /* Complementos */
        axios.get('/showComplementosSKU/' + this.skulistado_id)
        .then( response => {
          for (var i = 0; i < response.data.length; i++) {
            this.complementos.push(response.data[i]);
          }
        })
        .catch(function(error){
          console.log(error)
        })
      },
      setForm: function(columna,patron,reemplazo){
        columna.value = columna.value.split(patron).join(reemplazo);
      }
    }
  })
</script>
@endsection