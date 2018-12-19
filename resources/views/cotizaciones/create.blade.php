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
              <div class="form-group mt-2 mr-2">
                <span class="lead text-primary">Modulo: @{{ nombreModulo }}</span>
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
                  {!! Form::text('ancho', null, ['class' => 'form-control form-control-sm', 'title' => 'Alto', 'placeholder'=>'A', 'v-model' => 'ancho']) !!}
                </div>
                <div class="form-group col-md-4">
                  {!! Form::text('alto', null, ['class' => 'form-control form-control-sm', 'title' => 'Ancho', 'placeholder'=>'H', 'v-model' => 'alto']) !!}
                </div>
                <div class="form-group col-md-4">
                  {!! Form::text('profundidad', null, ['class' => 'form-control form-control-sm', 'title' => 'Profundidad', 'placeholder'=>'P', 'v-model' => 'profundidad']) !!}
                </div>
              </div>

              <div class="form-row">
                <div class="form-group mr-2">
                  {{-- {!! Form::select('material_caja', \App\Tablero::with('colore')->get()->pluck('colore.nombre','colore.nombre'), null, ['class'=>'form-control-sm form-control
                  ','placeholder'=>'Material Caja', 'v-model' => 'material_caja']) !!} --}}

                  <select name="material_caja" class="form-control form-control-sm" v-model="material_caja" @change="getEspesoresPemitidos()">
                    <option disabled selected value="">Material Caja</option>
                    <option v-for="item in espesoresList" :value="item.value">@{{ item.label }}</option>
                  </select>

                </div>
                <div class="form-group mr-2">
                  {!! Form::select('material_frente', \App\Tablero::with('colore')->get()->pluck('colore.nombre','colore.nombre'), null, ['class'=>'form-control-sm form-control
                  ','placeholder'=>'Material Frente','v-model' => 'material_frente']) !!}
                {{-- <select name="material_frente" class="form-control form-control-sm" >
                  <option disabled selected value="">Material Frente</option>
                  <option v-for="item in matfrente" :value="item.value">@{{ item.label }}</option>
                </select> --}}
              </div>
            </div>


            <div class="form-row">
              <div class="form-group mr-2">
                {!! Form::select('material_fondo', \App\Tablero::with('colore')->get()->pluck('colore.nombre','colore.nombre'), null, ['class'=>'form-control-sm form-control
                ','placeholder'=>'Material Fondo', 'v-model' => 'material_fondo']) !!}
                {{-- <select name="material_fondo" class="form-control form-control-sm" >
                  <option disabled selected value="">Material Fondo</option>
                  <option v-for="item in matfondo" :value="item.value">@{{ item.label }}</option>
                </select> --}}
              </div>
              <div class="form-group mr-2">
                {!! Form::select('material_gaveta', \App\Tablero::with('colore')->get()->pluck('colore.nombre','colore.nombre'), null, ['class'=>'form-control-sm form-control
                ','placeholder'=>'Material Gaveta', 'v-model' => 'material_gaveta']) !!}
                {{-- <select name="material_gaveta" class="form-control form-control-sm" >
                  <option disabled selected value="">Material Gaveta</option>
                  <option v-for="item in matgaveta" :value="item.value">@{{ item.label }}</option>
                </select> --}}
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                {{-- {!! Form::text('espesor_caja', null, ['class' => 'form-control form-control-sm', 'title' => 'Espesor Caja', 'placeholder' => 'EC', 'v-model' => 'espesor_caja']) !!} --}}
                {!! Form::select('espesor_caja', ['4'=>'4','15'=>'15','18'=>'18','25'=>'25'], null, ['class' => 'form-control form-control-sm', 'title' => 'Espesor Caja', 'placeholder' => 'EC', 'v-model' => 'espesor_caja']) !!}
              </div>
              <div class="form-group col-md-6">
                {!! Form::select('espesor_frente', ['4'=>'4','15'=>'15','18'=>'18','25'=>'25'], null, ['class' => 'form-control form-control-sm', 'title' => 'Espesor Frente', 'placeholder' => 'EF', 'v-model' => 'espesor_frente']) !!}
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                {!! Form::select('espesor_fondo', ['4'=>'4','15'=>'15','18'=>'18','25'=>'25'], null, ['class' => 'form-control form-control-sm', 'title' => 'Espesor Fondo', 'placeholder' => 'EO', 'v-model' => 'espesor_fondo']) !!}
              </div>
              <div class="form-group col-md-6">
                {!! Form::select('espesor_gaveta', ['4'=>'4','15'=>'15','18'=>'18','25'=>'25'], null, ['class' => 'form-control form-control-sm', 'title' => 'Espesor Gaveta', 'placeholder' => 'EG', 'v-model' => 'espesor_gaveta']) !!}
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Materiales</h6>
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
                {!! Form::select('marca_corredera', \App\Marca::pluck('nombre','id'), null, ['class'=>'form-control-sm form-control','placeholder'=>'Marca Corredera']) !!}
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
      </div>
    </div>
  </div>

  <div class="row mt-2" v-if="skus.length > 0">
    <div class="col-md">
      <table class="table table-bordered table-inverse table-hover">
        <caption>SKU's</caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Indice</th>
            <th>Etiqueta</th>
            <th>SKU</th>
            <th>Tipo</th>
            <th>Subtipo</th>
            <th>Categoria</th>
            <th>SAP</th>
            <th>Fondo</th>
            <th>Costo/MP</th>
            <th>Costo/Canto</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(sku, index) in skus" track-by="index">
            <td class="text-center">@{{ sku.id }}</td>
            <td class="text-center" v-on:click="setProp(index)">@{{ sku.indice = index + 1 }}</td>
            <td>
              <input class="form-control-plaintext form-control-sm text-center" type="text" id="etiqueta[]" name="etiqueta[]" value="" v-model="sku.etiqueta">
            </td>
            <td>@{{ sku.sku_padre }}</td>
            <td>@{{ sku.tipo }}</td>
            <td>@{{ sku.subtipo }}</td>
            <td>@{{ sku.categoria }}</td>
            <td>@{{ sku.sap }}</td>
            <td>@{{ sku.fondo }}</td>
            <td>@{{ sku.cmp }}</td>
            <td>@{{ sku.ccn }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row mt-2" v-if="piezas.length > 0">
    <div class="col-md">
      <table class="table table-bordered table-inverse table-hover">
        <caption>Piezas</caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Indice</th>
            <th>Pieza</th>
            <th>Material</th>
            <th>Descripcion</th>
            <th>Largo</th>
            <th>VL</th>
            <th>Ancho</th>
            <th>VA</th>
            <th>Area</th>
            <th>Costo/MP</th>
            <th>L-Sup</th>
            <th>L-Inf</th>
            <th>A-Izq</th>
            <th>A-Der</th>
            <th>ml/Canto</th>
            <th>Costo/Canto</th>
            <th>Mec 1</th>
            <th>Mec 2</th>
            <th>Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(pieza, index) in piezas" track-by="index">
            <td>@{{ pieza.id }}</td>
            <td class="text-center">@{{ pieza.indice }}</td>
            <td>@{{ pieza.pieza.tipo_pieza }}</td>
            <td>@{{ pieza.materiale.nombre }}</td>
            <td>@{{ pieza.descripcion }}</td>
            <td class="text-right">@{{ pieza.largo }}</td>
            <td class="text-right">@{{ pieza.vl }}</td>
            <td class="text-right">@{{ pieza.ancho }}</td>
            <td class="text-right">@{{ pieza.va }}</td>
            <td class="text-right">@{{ pieza.area }}</td>
            <td class="text-right"></td>
            <td class="text-right">@{{ pieza.largo_sup }}</td>
            <td class="text-right">@{{ pieza.largo_inf }}</td>
            <td class="text-right">@{{ pieza.ancho_izq }}</td>
            <td class="text-right">@{{ pieza.ancho_der }}</td>
            <td class="text-right"></td>
            <td class="text-right"></td>
            <td class="text-right">@{{ pieza.mecanizado1 }}</td>
            <td class="text-right">@{{ pieza.mecanizado2 }}</td>
            <td class="text-right">@{{ pieza.cantidad }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <div class="row mt-2" v-if="complementos.length > 0">
    <div class="col-md">
      <table class="table table-bordered table-inverse table-hover">
        <caption>Complementos</caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Indice</th>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th class="text-right">Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(complemento, index) in complementos" track-by="index">
            <td>@{{ complemento.id }}</td>
            <td>@{{ complemento.indice }}</td>
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

    created(){},

    data: {
      tipo_id: '',
      subtipo_id: '',
      categoria_id: '',
      sap_id: '',
      fondo_id: '',
      sku_padre_id: '',
      nombreModulo: '',
      skus: [],
      skulistado_id: '',
      subtipo_list: '',
      categoria_list: '',
      piezas: [],
      complementos: [],
      ancho: '',
      alto: '',
      profundidad: '',
      espesoresList: '',
      espesor_caja_permitido: '',
      material_caja: '',
      material_frente: '',
      material_fondo: '',
      material_gaveta: '',
      espesor_caja: '',
      espesor_frente: '',
      espesor_fondo: '',
      espesor_gaveta: '',
      pieza_calc: [],
      indice: '',
      contador: null,
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
      skulistado_id: function(){},
      skus: function(){
        this.addPiezas(this.skus.length);
        // this.setForm();
      },
      piezas: function(){
        this.setForm(this.skus[this.skus.length - 1].indice - 1);
      },
      complementos: function(){},
      ancho: function(){},
      alto: function(){},
      profundidad: function(){},
    },

    methods: {
      getSkuPadre: function(index){
        if(this.tipo_id && this.subtipo_id && this.categoria_id && this.sap_id && this.fondo_id){
          var uid = this.tipo_id + this.subtipo_id + this.categoria_id + this.sap_id + this.fondo_id;
          // console.log(uid);
          axios.get('/getSkuPadre/' + uid)
          .then( response => {
            console.log(response.data);
            this.skulistado_id = response.data.id;
            this.espesor_caja_permitido = response.data.modulo.espesor_caja_permitido;
            this.nombreModulo = response.data.modulo.nombre;
          })
          .catch(function(error){
            console.log(error)
          })
        }
      },
      getEspesoresPemitidos: function(){
        axios.get('/getEspesoreCaja/' + this.espesor_caja_permitido)
        .then( response => {
          console.log(response.data);
          this.espesoresList = response.data;
        })
        .catch(function(error){
          console.log(error)
        })
      },
      addSKU: function(){
        if(this.skulistado_id && this.ancho && this.alto && this.profundidad && this.espesor_caja && this.espesor_frente && this.espesor_fondo && this.espesor_gaveta){
          /* SKU */
          axios.get('/showSkuPadre/' + this.skulistado_id)
          .then(response => {
            this.skus.push({
              id: response.data.id,
              indice: '',
              modulo_id: response.data.modulo_id,
              etiqueta: this.contador += 1,
              sku_padre: response.data.sku_padre,
              tipo_id: response.data.tipo_id,
              tipo: response.data.tipo.nombre,
              subtipo_id: response.data.subtipo_id,
              subtipo: response.data.subtipo.nombre,
              categoria_id: response.data.categoria_id,
              categoria: response.data.categoria.nombre,
              sap_id: response.data.sap_id,
              sap: response.data.sap.valor,
              fondo_id: response.data.fondo_id,
              fondo: response.data.fondo.valor,
              alto: this.alto,
              ancho: this.ancho,
              profundidad: this.profundidad,
              espesor_caja: this.espesor_caja,
              espesor_frente: this.espesor_frente,
              espesor_fondo: this.espesor_fondo,
              espesor_gaveta: this.espesor_gaveta,
              cmp: '',
              ccn: ''
            })
          })
          .catch(function(error){
            console.log(error)
          });
        }else {
          alert('Defina las propiedades');
        }
      },
      addPiezas: function(idx){
        /* Piezas */
        axios.get('/piezasSkuPadre/' + this.skulistado_id)
        .then( response => {
          for (var i = 0; i < response.data.length; i++) {
            this.piezas.push({
              id: response.data[i].id,
              indice: idx,
              modulo_id: response.data[i].modulo_id,
              skulistado_id: response.data[i].skulistado_id,
              materiale_id: response.data[i].materiale_id,
              descripcion: response.data[i].descripcion,
              cantidad: response.data[i].cantidad,
              largo: response.data[i].largo,
              vl: null,
              largo_sup: response.data[i].largo_sup,
              largo_inf: response.data[i].largo_inf,
              ancho: response.data[i].ancho,
              va: null,
              ancho_izq: response.data[i].ancho_izq,
              ancho_der: response.data[i].ancho_der,
              area: null,
              mecanizado1: response.data[i].mecanizado1,
              mecanizado2: response.data[i].mecanizado2,
              pieza: response.data[i].pieza,
              materiale: response.data[i].materiale
            })
          }
        })
        .catch(function(error){
          console.log(error)
        })
      },
      addComplementos: function(idx){
        /* Complementos */
        axios.get('/showComplementosSKU/' + this.skulistado_id)
        .then( response => {
          for (var i = 0; i < response.data.length; i++) {
            this.complementos.push({
              id: response.data[i].id,
              skulistado_id: response.data[i].skulistado_id,
              modulo_id: response.data[i].modulo_id,
              indice: idx,
              categoria_id: response.data[i].categoria_id,
              categoria: response.data[i].categoria.nombre,
              descripcion: response.data[i].descripcion,
              cantidad: response.data[i].cantidad
            });
            // this.complementos.push(response.data[i]);
          }
        })
        .catch(function(error){
          console.log(error)
        })
      },
      setForm: function(idx){
        var ancho = this.skus[idx].ancho; //Ancho
        var alto = this.skus[idx].alto; //Alto
        var profundidad = this.skus[idx].profundidad; //Profundidad
        var ec = this.skus[idx].espesor_caja; //Espesor de caja EC
        var ef = this.skus[idx].espesor_frente; //Espesor de Frente EF
        var eo = this.skus[idx].espesor_fondo; //Espesor de fondo EO
        var eg = this.skus[idx].espesor_gaveta; //Espesor de gaveta EG

        var idxreg = idx + 1;
        for (var i = 0; i < this.piezas.length; i++) {
          if(this.piezas[i].indice == idxreg){
            /* Ancho */
            this.piezas[i].vl = eval((this.piezas[i].largo.replace(/A{1}/g, ancho).replace(/H{1}/g,alto).replace(/P{1}/g,profundidad).replace(/EC/g,ec).replace(/EF/g,ef).replace(/EO/g,eo).replace(/EG/g,eg)));
            /* Alto */
            this.piezas[i].va = eval((this.piezas[i].ancho.replace(/A{1}/g, ancho).replace(/H{1}/g,alto).replace(/P{1}/g,profundidad).replace(/EC/g,ec).replace(/EF/g,ef).replace(/EO/g,eo).replace(/EG/g,eg)));
            /* Area */
            this.piezas[i].area = (this.piezas[i].vl * this.piezas[i].va) / 1000000;
          }
        }
      },
      setArea: function(){},
      setProp: function(index){}
    }
  })
</script>
@endsection