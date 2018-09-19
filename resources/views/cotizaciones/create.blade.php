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

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Propiedades</h6>

              <div class="form-row">
                <div class="form-group col-md-4">
                  {!! Form::text('ancho', null, ['class' => 'form-control form-control-sm','placeholder'=>'Ancho']) !!}
                </div>
                <div class="form-group col-md-4">
                  {!! Form::text('alto', null, ['class' => 'form-control form-control-sm','placeholder'=>'Alto']) !!}
                </div>
                <div class="form-group col-md-4">
                  {!! Form::text('profundidad', null, ['class' => 'form-control form-control-sm','placeholder'=>'Profundidad']) !!}
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md">
                  <select class="form-control form-control-sm" name="tipo_gaveta" v-model="gaveta_tipo">
                    <option value="" disabled selected>Tipo Gaveta</option>
                    <option v-for="item in gavetas" :value="item.value">@{{ item.label }}</option>
                  </select>
                </div>
                <div class="form-group col-md">
                  <select class="form-control form-control-sm" name="tipo_gaveta_prop" v-model="gaveta_tipo_prop">
                    <option value="" disabled selected>Pro/Ext</option>
                    <option value="1">Con Freno</option>
                    <option value="2">Sin Freno</option>
                  </select>
                </div>
                <div class="form-group col-md">
                  <select name="" class="form-control form-control-sm" v-model="corredera">
                    <option value="" disabled selected>Marca</option>
                    <option v-for="item in MarcasGavList" :value="item.value">@{{ item.label }}</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md">
                  <select class="form-control form-control-sm" name="tipo_bisagra" v-model="bisagra_tipo">
                    <option value="" disabled selected>Tipo Bisagras</option>
                    <option v-for="item in bisagras" :value="item.value">@{{ item.label }}</option>
                  </select>
                </div>
                <div class="form-group col-md">
                  <select class="form-control form-control-sm" name="bisagra_tipo_prop" v-model="bisagra_tipo_prop">
                    <option value="" disabled selected>Pro/Ext</option>
                    <option value="1">Con Freno</option>
                    <option value="2">Sin Freno</option>
                  </select>
                </div>
                <div class="form-group col-md">
                  <select name="" class="form-control form-control-sm" v-model="bisagra">
                    <option value="" disabled selected>Marca</option>
                    <option v-for="item in MarcasBisList" :value="item.value">@{{ item.label }}</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <select class="form-control form-control-sm" name="tirador" v-model="tirador">
                    <option value="" disabled selected>Tirador</option>
                    <option v-for="item in tiradores" :value="item.value">@{{ item.label }}</option>
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

        <div class="col-md-3">
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
                <select name="material_caja" class="form-control form-control-sm" v-model="material_caja">
                  <option disabled selected value="">Material Caja</option>
                  <option v-for="item in matcaja" :value="item.value">@{{ item.label }}</option>
                </select>
              </div>
              <div class="form-group mr-2">
                <select name="material_frente" class="form-control form-control-sm" v-model="material_frente">
                  <option disabled selected value="">Material Frente</option>
                  <option v-for="item in matfrente" :value="item.value">@{{ item.label }}</option>
                </select>
              </div>
              <div class="form-group mr-2">
                <select name="material_fondo" class="form-control form-control-sm" v-model="material_fondo">
                  <option disabled selected value="">Material Fondo</option>
                  <option v-for="item in matfondo" :value="item.value">@{{ item.label }}</option>
                </select>
              </div>
              <div class="form-group mr-2">
                <select name="material_gaveta" class="form-control form-control-sm" v-model="material_gaveta">
                  <option disabled selected value="">Material Gaveta</option>
                  <option v-for="item in matgaveta" :value="item.value">@{{ item.label }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-2">
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
            <th class="text-center">Cantidad</th>
            <th>Precio/Unid</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(mtp, index) in mtps" track-by="index">
            <td>@{{ index + 1 }}</td>
            <td>@{{ mtp.skup }}</td>
            <td>@{{ mtp.tipo }}</td>
            <td>@{{ mtp.subtipo }}</td>
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
            <th>Material</th>
            <th>Descripción</th>
            <th>Largo</th>
            <th>Alto</th>
            <th>Espesor</th>
            <th>Canto <small>Izq</small></th>
            <th>Canto <small>Der</small></th>
            <th>Canto <small>Sup</small></th>
            <th>Canto <small>Inf</small></th>
            <th>Mec1</th>
            <th>Mec2</th>
            <th class="text-center">Categoria</th>
            <th class="text-center">Cantidad</th>
            <th>Precio/Unid</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(material, indice) in materiales" track-by="indice">
            <td>@{{ indice + 1 }}</td>
            <td>@{{ material.skup }}</td>
            <td>@{{ material.material }}</td>
            <td>@{{ material.descripcion }}</td>
            <td>@{{ material.largo }}</td>
            <td>@{{ material.alto }}</td>
            <td>@{{ material.profundidad }}</td>
            <td>@{{ material.largo_izq }}</td>
            <td>@{{ material.largo_der }}</td>
            <td>@{{ material.alto_sup }}</td>
            <td>@{{ material.alto_inf }}</td>
            <td>@{{ material.mec1 }}</td>
            <td>@{{ material.mec2 }}</td>
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
      axios.get('/dataGavetas').then( response => { this.gavetas = response.data }).catch( function(error) { console.log(error)});
      axios.get('/dataBisagras').then( response => { this.bisagras = response.data }).catch( function(error) { console.log(error)});
      axios.get('/dataTiradores').then( response => { this.tiradores = response.data }).catch( function(error) { console.log(error)});
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
      // mtpProductosList: [],
      mtps: [],
      piezas: '',
      gavetas_cant: '',
      gavetas: '',
      gaveta_tipo: '',
      gaveta_tipo_id: 3,
      gaveta_tipo_prop: '',
      MarcasGavList: '',
      MarcasBisList: '',
      corredera: '',
      bisagra: '',
      bisagras: '',
      bisagra_tipo: '',
      bisagra_tipo_id: 1,
      bisagra_tipo_prop: '',
      tirador: '',
      tiradores: '',
      // skumtpPro: []
    },

    watch: {
      tipo: function(){
        if(this.tipo > 0){
          axios.get('/subtipos/' + this.tipo)
          .then( response => {
            this.subtipos = response.data;
          })
          .catch(function(error) { console.log(error)})
        }else if(this.tipo > 0 && this.subtipo > 0 && this.sap > 0 && this.sar > 0){
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
            // console.log(this.piezas)
          })
          .catch(function(error){
            console.log(error)
          })
        }
      },
      gaveta_tipo: function(){
        if(this.gaveta_tipo > 0 && this.gaveta_tipo_prop > 0){
          this.setMarcasGavetas(this.gaveta_tipo_id,this.gaveta_tipo,this.gaveta_tipo_prop);
        }
      },
      gaveta_tipo_prop: function(){
        if(this.gaveta_tipo > 0 && this.gaveta_tipo_prop > 0){
          this.setMarcasGavetas(this.gaveta_tipo_id,this.gaveta_tipo,this.gaveta_tipo_prop);
        }
      },
      bisagra_tipo: function(){
        if(this.bisagra_tipo > 0 && this.bisagra_tipo_prop > 0){
          this.setMarcasBisagras(this.bisagra_tipo_id,this.bisagra_tipo,this.bisagra_tipo_prop);
        }
      },
      bisagra_tipo_prop: function(){
        if(this.bisagra_tipo > 0 && this.bisagra_tipo_prop > 0){
          this.setMarcasBisagras(this.bisagra_tipo_id,this.bisagra_tipo,this.bisagra_tipo_prop);
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

        for (var i = 0; i < this.complementos.length; i++) {
          this.mtps.push(this.complementos[i]);
        }

        for (var i = 0; i < this.piezas.length; i++) {
          this.materiales.push(this.piezas[i]);
        }
      },
      setMarcasGavetas: function(tipo,subtipo,extra){
        if(this.gaveta_tipo > 0 && this.gaveta_tipo_prop > 0){
          axios.get('/dataMarcasHerrajes/' + tipo + '/' + subtipo + '/' + extra)
          .then(response => {
            this.MarcasGavList = response.data
          })
          .catch( function(error){
            console.log(error)
          })
        }
      },
      setMarcasBisagras: function(tipo,subtipo,extra){
        if(this.bisagra_tipo > 0 && this.bisagra_tipo_prop > 0){
          axios.get('/dataMarcasHerrajes/' + tipo + '/' + subtipo + '/' + extra)
          .then(response => {
            this.MarcasBisList = response.data
          })
          .catch( function(error){
            console.log(error)
          })
        }
      }
    }

  })
</script>
@endsection