@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid" v-cloak>
  <div class="row">
    <div class="col-md">
      <h3>Constructor</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  {!! Form::open(['route' => 'constructor.ensamble', 'method' => 'POST']) !!}
  <div class="row">
    <div class="col-md-6"><!-- Data Seleccion -->
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::select('tipo_id', \App\Tipo::where('tipologia','=','PTO')->pluck('nombre','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'TIPO', 'v-model' => 'tipo']) !!}
        </div>
        <div class="form-group mr-2" v-if="tipo > 10 && tipo < 18">
          <select class="form-control form-control-sm" name="subtipo_id" v-model="subtipo" @change="getSkuBase">
            <option value="" disabled>Selección</option>
            <option v-for="(item, index) in subtipos" :value="item.value">@{{ item.label }}</option>
          </select>
        </div>
        <div class="form-group">
          {!! Form::text('sku', 'SKU', ['class' => 'form-control form-control-sm','placeholder'=>'SKU','v-model'=>'ptosku']) !!}
        </div>
      </div>
      <!-- Nombre y Descripcion  -->
      <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control form-control-sm col-md-6','placeholder'=>'Nombre']) !!}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::select('sap', \App\Confpart::where('nombre','=','Sist. de Apertura')->pluck('valor','id'), null, ['class' => 'form-control form-control-sm','placeholder'=>'Sist. de Apertura']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::select('sar', \App\Confpart::where('nombre','=','Sist. de Armado')->pluck('valor','id'), null, ['class' => 'form-control form-control-sm','placeholder'=>'Sist. de Armado']) !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control form-control-sm col-md-6','size'=>'30x3','placeholder'=>'Descripción']) !!}
      </div>
      <!-- Propiedades PTO -->
      <div v-if="tipo > 10">
        <div class="form-row">
          <div class="form-group mr-1">
            {!! Form::text('ptolargo', null, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'Largo']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::text('ptoalto', null, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'alto']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::text('ptoprofundidad', null, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'Profundidad']) !!}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5" @keyup.ctrl.alt.97="addRowMTP(this.app.mtps.length -1)">
      <table class="table table-sm table-bordered">
        <caption>Complementos</caption>
        <thead class="font-weight-bold" style="font-size: 0.8em;">
          <tr>
            <th width="33%" class="align-middle text-left">Tipo</th>
            <th width="33%" class="align-middle text-left">Sub-Tipo</th>
            <th width="33%" class="align-middle text-right">Cantidad</th>
            <th class="align-middle text-center"><a class="btn btn-link" alt="Ctrl+Alt+1" href="#" title="Agregar | Cntrl+Alt+1" @click="addRowMTP(this.app.mtps.length -1)"><i class="fas fa-plus fa-xs"></i></a></th>
          </tr>
        </thead>
          <tbody>
            <tr v-for="(mtp, $index) in mtps" track-by="$index">
              <td>
                <select class="form-control form-control-sm" name="mtp_tipo_id[]" v-model="mtp.tipo" @change="getSubtipo($index,mtps[$index].tipo)" required>
                  <option v-for="(tipo, indice) in tipos" :value="tipo.value">@{{ tipo.label }}</option>
                </select>
              </td>
              <td>
                <select class="form-control form-control-sm" name="mtp_subtipo_id[]" v-model="mtp.subtipo" required>
                  <option v-for="(subtipo, indice) in mtpsList[$index]" :value="subtipo.value">@{{ subtipo.label }}</option>
                </select>
              </td>
              <td>
                {!! Form::number('mtp_cantidad[]', null, ['class'=>'form-control form-control-sm text-right','placeholder'=>'Cantidad','min' => 1, 'v-model'=>'mtp.cantidad','required']) !!}
              </td>
              <td class="align-middle text-center">
                <a class="btn btn-link text-danger align-middle" href="#" title="Eliminar" @click="removeRowMTP($index)" v-if="mtps.length > 1"><i class="fas fa-minus fa-xs"></i></a>
              </td>
            </tr>
          </tbody>
      </table>
    </div>
  </div>
  <div class="row mt-2 mb-2"  @keyup.ctrl.alt.98="addRowMAT(this.app.materiales.length -1)">
    <div class="col-md card">
        <table class="table table-sm table-bordered">
          <caption>Piezas</caption>
          <thead class="font-weight-bold" style="font-size: 0.8em;">
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td colspan="4" class="text-center">Canto</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="align-middle">Material</td>
              <td class="align-middle">Descripcion</td>
              <td class="align-middle">Largo</td>
              <td class="align-middle">Alto</td>
              <td class="align-middle">Espesor</td>
              <td class="align-middle text-center">L-IZQ</td>
              <td class="align-middle text-center">L-DER</td>
              <td class="align-middle text-center">A-SUP</td>
              <td class="align-middle text-center">A-INF</td>
              <td class="align-middle">Mec1</td>
              <td class="align-middle">Mec2</td>
              <td class="align-middle">Cantidad</td>
              <td class="align-middle text-center">
                <a class="btn btn-link float-right align-middle" href="#" alt="Ctrl+Alt+2" title="Agregar | Ctrl+Alt+2" @click="addRowMAT(this.app.materiales.length -1)"><i class="fas fa-plus fa-xs"></i></a>
              </td>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(material, $indice) in materiales" track-by="$indice">
              <td>
                <select class="form-control form-control-sm" title="Material" name="psematerial_id[]" v-model="material.material_id" required @change="filterMaterial(materiales[$indice].material_id,$indice)">
                  <option v-for="(item, indice) in materialMatriz" :value="item.value">@{{ item.label }}</option>
                </select>
              </td>
              <td>
                <select name="psedescripcion[]" class="form-control form-control-sm" v-model="material.descripcion_id" required @change="setFormulas(materiales[$indice].descripcion_id,$indice)">
                  <option v-for="(descripcion, index) in descripciones[$indice]" :value="descripcion.value">@{{ descripcion.label }}</option>
                </select>
              </td>
              <td>
                {!! Form::text('pselargo[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Largo','v-model'=>'material.largo']) !!}
              </td>
              <td>
                {!! Form::text('psealto[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'alto','v-model' => 'material.alto']) !!}
              </td>
              <td>
                {!! Form::select('pseprofundidad[]', [3=>3,4=>4,6=>6,10=>10,12=>12,15=>15,16=>16,18=>18,19=>19,20=>20,25=>25], null, ['class'=>'form-control form-control-sm', 'placeholder'=>'']) !!}
              </td>
              <td>
                <select class="form-control form-control-sm" name="pselargo_izq[]" v-model="material.largo_izq">
                  <option value="0.45" >0.45</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                </select>
              </td>
              <td>
                <select class="form-control form-control-sm" name="pselargo_der[]" v-model="material.largo_der">
                  <option value="0.45" >0.45</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                </select>
              </td>
              <td>
                <select class="form-control form-control-sm" name="psealto_sup[]" v-model="material.alto_sup">
                  <option value="0.45" >0.45</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                </select>
              </td>
              <td>
                <select class="form-control form-control-sm" name="psealto_inf[]" v-model="material.alto_inf">
                  <option value="0.45" >0.45</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                </select>
              </td>
              <td>{!! Form::text('psemec1[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Mec1','v-model'=>'material.mec1']) !!}</td>
              <td>{!! Form::text('psemec2[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Mec2','v-model'=>'material.mec2']) !!}</td>
              <td>{!! Form::number('psecantidad[]', null, ['class' => 'form-control form-control-sm text-right', 'min' => 1, 'title' =>'Cant', 'v-model' => 'material.cant','required']) !!}</td>
              <td class="align-middle text-center">
                <a class="btn btn-link text-danger align-middle" alt="Ctrl+Alt+7" href="#" title="Eliminar | Ctrl+Alt+7" @click="removeRowMAT($indice)" v-if="materiales.length > 1"><i class="fas fa-minus fa-xs"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
  <a class="btn btn-warning text-danger" href="{{ url('/home') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
  {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var app = new Vue({
    el: '#app',

    created(){
      axios.get('/TiposMTP').then( response => { this.tipos = response.data }).catch(function(error) { console.log(error) });
    },

    data: {
      ptosku: '',
      tipos: '',
      tipo: '',
      subtipos: '',
      subtipo: '',
      base: '',
      basesku: '',
      numeracion: '',
      mtpsList: [],
      mtps: [{ tipo: '', subtipo: '', cantidad: 0 }],
      materialMatriz: '',
      descripciones: [],
      materiales: [{ material_id: '', descripcion_id: '', largo: '', alto: '', profundidad: '', largo_izq: '', largo_der: '', alto_sup: '', alto_inf: '', veta: '', mec1: '', mec2: '', cant: 0 }]
    },

    watch: {
      tipo: function(){
        if(this.tipo > 0){
          axios.get('/subtipos/' + this.tipo)
          .then( response => {
            this.subtipos = response.data;
          })
          .catch(function(error){
            console.log(error)
          })
        }
      }
    },

    methods: {
      addRowMTP: function (index) {
        this.mtps.splice(index + 1, 1, { tipo: null, subtipo: null, cantidad: 0 });
      },
      removeRowMTP: function(index){
        // console.log(index);
        if( this.mtps.length > 1){
          this.mtps.splice(index, 1);
        }
      },
      addRowMAT: function (indice) {
        try {
          this.materiales.splice(indice + 1, 1, { material_id: '', descripcion: '', largo: '', alto: '', profundidad: '', largo_izq: '', largo_der: '', alto_sup: '', alto_inf: '', veta: '', mec1: '', mec2: '', cant: 0 });
        } catch(e)
        {
          console.log(e);
        }
      },
      removeRowMAT: function(indice){
        // console.log(indice);
        if( this.materiales.length > 1){
          this.materiales.splice(indice, 1);
        }
      },
      getMateriales: function(){
        axios.get('/materiales')
        .then( response => {
          this.materialMatriz = response.data
        })
        .catch(function(error) {
          console.log(error);
        })
      },
      getSkuBase: function(){
        axios.get('/getBaseSku/' + this.tipo + '/' + this.subtipo)
        .then( response => {
          // console.log(response.data);
          this.numeracion = response.data[0].numeracion;
          this.base = response.data[0].skubase;
          this.ptosku = this.base;
          this.searchSKU();
        })
        .catch(function(error) {
          console.log(error)
        })
      },
      searchSKU: function(){
        axios.get('/querySKU/' + this.ptosku)
        .then( response => {
          if(response.data.length > 0){
            // console.log(response.data[0].sku);
            this.numeracion = Number(response.data[0].ptosku.substr(-6));
            var num = this.numeracion + 1;
            Number.prototype.pad = function(size){
              var s = String(this);
              while (s.length < (size || 2)) { s = "0" + s; }
              return s;
            }
            this.ptosku = this.ptosku + '-' + num.pad(6);
          }else {
            this.ptosku = this.ptosku + '-' + '000001';
          }
          this.setMateriales();
        })
        .catch(function(error) {
          console.log(error);
        })
      },
      setMateriales: function(){
        axios.get('/setMaterial/' + this.tipo + '/' + this.subtipo)
        .then( response => {
          this.materialMatriz = response.data
        })
        .catch(function(error) {
          console.log(error)
        })
      },
      filterMaterial: function(material,indice){
        /* Metodo para chequear */
        axios.get('/descripcionMaterial/' + material )
        .then( response => {
          this.descripciones.splice(indice, 1, response.data);
            // console.log(response.data);
          })
        .catch(function(error){
          console.log(error)
        })
      },
      setFormulas: function(index,indice){
        var row = null;
        // console.log(index + ' - ' + indice);
        // console.log(this.descripciones[indice]);

        this.descripciones[indice].filter(function(vars) {
          if(vars.value == index){
            row = vars;
          }
        })
        console.log(row);
        console.log(this.materiales[indice]);
        this.materiales[indice].descripcion_id = row.value;
        this.materiales[indice].alto = row.falto;
        this.materiales[indice].largo = row.flargo;
        this.materiales[indice].profundidad = row.profundidad;
      },
      getSubtipo: function(index,tipo){
        // console.log(index);
        // console.log(tipo);
        axios.get('/mtpsubtipos/' + tipo)
        .then( response => {
          this.mtpsList.splice(index, 1, response.data);
        })
      }
    },

  })
</script>
@endsection