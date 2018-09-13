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
                {!! Form::select('sap', \App\Confpart::where('acronimo','=','sap')->pluck('valor','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'Sist. de Apertura','v-model' => 'sap']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                {!! Form::select('sar', \App\Confpart::where('acronimo','=','sar')->pluck('valor','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'Sist. de Armado', 'v-model' => 'sar', '@change' => 'getModulos();']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
                <select name="modulo" class="form-control form-control-sm" v-model="modulo">
                  <option value="" disabled>Indique el Modulo</option>
                  <option v-for="item in modulosList" :value="item.value">@{{ item.label }}</option>
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

              <div class="form-row">
                <div class="form-group col-md-8 mt-2 mr-2">
                  <select class="form-control form-control-sm" name="tipo_gaveta">
                    <option value="" disabled selected>Tipo Gaveta</option>
                    <option v-for="item in gavetas" :value="item.value">@{{ item.label }}</option>
                  </select>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" value="1" id="prop_corredera">
                  <label class="form-check-label" for="defaultCheck1">
                    <small class="text-primary">c/Freno</small>
                  </label>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-8 mt-2 mr-2">
                  {!! Form::select('tipo_bisagra', \App\Subtipo::where('tipo_id',1)->whereIn('id',[1,2,3,4])->pluck('nombre','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'Tipo Bisagra', 'title' => 'Tipo de Bisagras']) !!}
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" value="1" id="prop_bisagra">
                  <label class="form-check-label" for="defaultCheck1">
                    <small class="text-primary">c/Freno</small>
                  </label>
                </div>
              </div>

              <div class="form-group mt-2 mr-2">
                {!! Form::select('tirador', \App\Producto::where('tipo_id',9)->where('subtipo_id',39)->pluck('nombre','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'Tirador']) !!}
              </div>
              <div class="form-group mt-2 mr-2">
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
                <select name="material_caja" class="form-control form-control-sm" v-model="material_caja">
                  <option disabled selected value="">Material Caja</option>
                  <option v-for="item in matcaja" :value="item.value">@{{ item.label }}</option>
                </select>
              </div>
              <div class="form-group mt-2 mr-2">
                <select name="material_frente" class="form-control form-control-sm" v-model="material_frente">
                  <option disabled selected value="">Material Frente</option>
                  <option v-for="item in matfrente" :value="item.value">@{{ item.label }}</option>
                </select>
              </div>
              <div class="form-group mt-2 mr-2">
                <select name="material_fondo" class="form-control form-control-sm" v-model="material_fondo">
                  <option disabled selected value="">Material Fondo</option>
                  <option v-for="item in matfondo" :value="item.value">@{{ item.label }}</option>
                </select>
              </div>
              <div class="form-group mt-2 mr-2">
                <select name="material_gaveta" class="form-control form-control-sm" v-model="material_gaveta">
                  <option disabled selected value="">Material Gaveta</option>
                  <option v-for="item in matgaveta" :value="item.value">@{{ item.label }}</option>
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
            <button type="button" class="btn btn-sm btn-primary" @click="addModulo()">Añadir Modulo</button>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="row mt-2">
    <div class="col-md">
      <table class="table table-sm">
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
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in modulos" track-by="index">
            <td>@{{ item.sku }}</td>
            <td>@{{ item.codigo }}</td>
            <td>@{{ item.tipo.nombre }}</td>
            <td>@{{ item.subtipo.nombre }}</td>
            <td>@{{ item.nombres.nombre }}</td>
            <td>@{{ item.saps.valor }}</td>
            <td>@{{ item.sars.valor }}</td>
            <td><a class="btn btn-link text-danger align-middle" href="#" title="Eliminar"><i class="fas fa-minus fa-xs"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-md">
      <table class="table table-sm">
        <caption>Complementos (MTP's)</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>SKU/Padre</th>
            <th>Tipo</th>
            <th>Subtipo</th>
            <th>Producto</th>
            <th class="text-center">SKU</th>
            <th class="text-center">Cantidad</th>
            <th>Precio/Unid</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(mtp, index) in mtps" track-by="index">
            <td>@{{ index + 1 }}</td>
            <td>@{{ sku_padre }}</td>
            <td>@{{ mtp.tipo.nombre }}</td>
            <td>@{{ mtp.subtipo.nombre }}</td>
            <td width="20%">
              <select name="mtp_producto[]" class="form-control form-control-sm" v-model="mtp.producto" @change="skumtp(mtp.producto,index)">
                <option value="" disabled selected>Producto</option>
                <option v-for="item in mtpProductosList[index]" :value="item.value">@{{ item.label }}</option>
              </select>
            </td>
            <td class="text-center">@{{ skumtpPro[index] }}</td>
            <td class="text-center">@{{ mtp.cantidad }}</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <div class="row mt-2">
    <div class="col-md">
      <table class="table table-sm">
        <caption>Piezas (Materiales)</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>SKU/Padre</th>
            <th>SKU</th>
            <th>Material</th>
            <th>Descripción</th>
            <th class="text-center">Categoria</th>
            <th class="text-center">Cantidad</th>
            <th>Precio/Unid</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(material, indice) in materiales" track-by="indice">
            <td>@{{ indice + 1 }}</td>
            <td>@{{ sku_padre }}</td>
            <td></td>
            <td>@{{ material.material.nombre }}</td>
            <td>@{{ material.descripcion.descripcion }}</td>
            <td class="text-center">@{{ banda }}</td>
            <td class="text-center">@{{ material.cantidad }}</td>
            <td></td>
            <td></td>
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
      axios.get('/materialCotiza/1').then( response => { this.matcaja = response.data }).catch(function(error) { console.log(error) });
      axios.get('/materialCotiza/2').then( response => { this.matfrente = response.data }).catch(function(error) { console.log(error) });
      axios.get('/materialCotiza/3').then( response => { this.matfondo = response.data }).catch(function(error) { console.log(error) });
      axios.get('/materialCotiza/7').then( response => { this.matgaveta = response.data }).catch(function(error) { console.log(error) });
      // axios.get('/gavetasTipo').then( response => { this.gavetas = response.data }).catch(function(error) { console.log(error)});
    },

    data: {
      sku_padre: '',
      tipo: '',
      subtipos: '',
      subtipo: '',
      sap: '',
      sar: '',
      modulo: '',
      modulosList: [],
      modulos: [],
      materiales: [],
      banda: '',
      matcaja: [],
      material_caja: '',
      matfrente: [],
      material_frente: '',
      matfondo: [],
      material_fondo: '',
      matgaveta: [],
      material_gaveta: '',
      proyecto: '',
      complementos: '',
      mtpProductosList: [],
      mtps: '',
      piezas: '',
      gavetas_cant: '',
      gavetas: '',
      skumtpPro: []
    },

    watch: {
      tipo: function(){
        if(this.tipo > 0){
          axios.get('/dataGavetas/' + this.tipo).then( response => { this.gavetas = response.data }).catch( function(error) { console.log(error)});
          axios.get('/subtipos/' + this.tipo)
          .then( response => {
            this.subtipos = response.data;
          })
          .catch(function(error) { console.log(error)})
        }else if(this.tipo > 0 && this.subtipo > 0 && this.sap > 0 && this.sar > 0){
          axios.get('/dataGavetas/' + this.tipo).then( response => { this.gavetas = response.data }).catch( function(error) { console.log(error)});
          this.getModulos();
        }
      },
      sap: function(){
        if(this.tipo > 0 && this.subtipo > 0 && this.sap > 0 && this.sar > 0){
          this.getModulos();
        }
      },
      sar: function(){
        if(this.tipo > 0 && this.subtipo > 0 && this.sap > 0 && this.sar > 0){
          this.getModulos();
        }
      },
      modulo: function(){
        if(this.modulo > 0){
          axios.get('/cotizaProyecto/' + this.modulo)
          .then( response => {
            this.proyecto = response.data.proyecto;
            this.sku_padre = response.data.proyecto.sku;
            this.complementos = response.data.complementos;
            this.piezas = response.data.piezas;
            this.gavetas_cant = response.data.gavetas_cant;
            // console.log(this.complementos);
            // console.log(this.proyecto)
          })
          .catch(function(error){
            console.log(error)
          })
        }
      },
      mtps: function(){
        for (var i = 0; i < this.mtps.length; i++) {
          // console.log(i);
          axios.get('/setCotizacion/' + this.mtps[i].mtp_tipo_id + '/' + this.mtps[i].mtp_subtipo_id)
          .then(response => {
            this.mtpProductosList.splice(i, 1, response.data)
          })
          .catch(function(error){
            console.log(error)
          })
        }
      }
    },

    methods: {
      getModulos: function(){
        axios.get('/getModulos/' + this.tipo + '/' + this.subtipo + '/' + this.sap + '/' + this.sar)
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
      },
      addModulo: function(){
        this.modulos.push(this.proyecto);
        this.mtps = this.complementos;
        this.materiales = this.piezas;
      },
      skumtp: function(id,index){
        axios.get('/getMtpSKU/' + id)
        .then( response => {
          this.skumtpPro.splice(index, 1, response.data);
          // console.log(response.data);
        })
      }
    },

  })
</script>
@endsection