@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid" v-cloak>
  <div class="row">
    <div class="col-md">
      <h3>Constructor <span class="font-weight-bold text-warning">Edición</span></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/frontend/proyectos') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  {!! Form::model($proyecto, ['route' => ['constructor.update', $proyecto->id],'method'=>'PATCH']) !!}
  <div class="row">
    <div class="col-md-6"><!-- Data Seleccion -->
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::select('tipo_id', \App\Tipo::where('tipologia','=','PTO')->pluck('nombre','id'), null, ['readonly','class' => 'form-control form-control-sm','placeholder' => 'TIPO','v-model'=>'tipo_id']) !!}
        </div>
        <div class="form-group mr-2">
          <select class="form-control form-control-sm" name="subtipo_id" v-model="subtipo_id" readonly>
            <option v-for="subtipo in subtipos" :value="subtipo.value">@{{ subtipo.label }}</option>
          </select>
        </div>
        <div class="form-group">
          {!! Form::text('sku', $proyecto->sku, ['readonly','class' => 'form-control form-control-sm']) !!}
        </div>
      </div>
      <!-- Nombre y Descripcion  -->
      <div class="form-group">
        {!! Form::text('nombre', $proyecto->nombre, ['class'=>'form-control form-control-sm col-md-6','placeholder'=>'Nombre','required']) !!}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::select('sap', \App\Confpart::where('nombre','=','Sist. de Apertura')->pluck('valor','id'), $proyecto->sap, ['class' => 'form-control form-control-sm','placeholder'=>'Sist. de Apertura']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::select('sar', \App\Confpart::where('nombre','=','Sist. de Armado')->pluck('valor','id'), $proyecto->sar, ['class' => 'form-control form-control-sm','placeholder'=>'Sist. de Armado']) !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::textarea('descripcion', $proyecto->descripcion, ['class'=>'form-control form-control-sm col-md-6','size'=>'30x3','placeholder'=>'Descripción','required']) !!}
      </div>
      <!-- Propiedades PTO -->
      <div>
        <div class="form-row">
          <div class="form-group mr-1">
            {!! Form::text('ptolargo', $proyecto->largo, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'Largo']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::text('ptoalto', $proyecto->alto, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'alto']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::text('ptoprofundidad', $proyecto->profundidad, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'Profundidad']) !!}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5" @keyup.ctrl.alt.97="addRowMTP(this.app.mtps.length -1)">
      <table class="table table-sm table-bordered">
        <caption>Complementos</caption>
        <thead class="font-weight-bold" style="font-size: 0.8em;">
          <tr>
            <th width="33%" class="align-middle">Tipo</th>
            <th width="33%" class="align-middle">SubTipo</th>
            <th width="33%" class="align-middle text-right"  width="18%">Cantidad</th>
            <th class="align-middle text-center"><a class="btn btn-link" href="#" alt="Ctrl+Alt+1" title="Agregar | Ctrl+Alt+1" @click="addRowMTP(this.app.mtps.length -1)"><i class="fas fa-plus fa-xs"></i></a></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in mtps" track-by="index">
            <input type="hidden" name="mtp_id[]" v-model="item.mtp_id">
            <input type="hidden" name="mtp_producto_id[]" v-model="item.mtp_producto_id">
            <td>
              <select name="mtp_tipo_id[]" class="form-control form-control-sm" v-model="item.mtp_tipo_id" @change="getSubtipo(index,mtps[index].mtp_tipo_id)" required>
                <option v-for="tipo in tiposMTP" :value="tipo.value">@{{ tipo.label }}</option>
              </select>
            </td>
            <td>
              <select name="mtp_subtipo_id[]" class="form-control form-control-sm" v-model="item.mtp_subtipo_id" required>
                <option v-for="subtipo in subtipoMTP[index]" :value="subtipo.value">@{{ subtipo.label }}</option>
              </select>
            </td>
            <td>
              {!! Form::number('mtp_cantidad[]', null, ['class' => 'form-control form-control-sm text-right','min' => 1, 'v-model'=>'item.mtp_cantidad', 'required']) !!}
            </td>
            <td>
              <a class="btn btn-link  align-middle text-danger" href="#" alt="Ctrl+Alt+2" title="Eliminar | Ctrl+Alt+2" @click="removeRowMTP(index)" v-if="mtps.length > 1"><i class="fas fa-minus fa-xs"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row mt-2 mb-2" @keyup.ctrl.alt.98="addRowMAT(this.app.materiales.length -1)">
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
            <td class="align-middle">alto</td>
            <td class="align-middle">Profundidad</td>
            <td class="align-middle">LargoIZQ</td>
            <td class="align-middle">LargoDER</td>
            <td class="align-middle">altoSUP</td>
            <td class="align-middle">altoINF</td>
            <td class="align-middle" width="8%">Mec1</td>
            <td class="align-middle" width="8%">Mec2</td>
            <td class="align-middle" width="5%">Cantidad</td>
            <td class="align-middle">
              <a class="btn btn-link  float-right" href="#" alt="Ctrl+Alt+2" title="Agregar | Ctrl+Alt+2" @click="addRowMAT(this.app.materiales.length -1)"><i class="fas fa-plus fa-xs"></i></a>
            </td>
          </tr>
        </thead>
        <tbody>
          {{-- @foreach ($materiales as $element) --}}
          <tr v-for="(item, index) in materiales" track-by="index">
            <td>
              <input type="hidden" name="pse_id[]" v-model="item.id">
              <input type="hidden" name="pseproducto_id[]" v-model="item.producto_id">
              <select name="psematerial_id[]" class="form-control form-control-sm" v-model="item.material_id" @change="filterMaterial(materiales[index].material_id,index)">
                <option v-for="item in materialesPSE" :value="item.value">@{{ item.label }}</option>
              </select>
            </td>
            <td>
              <select name="psedescripcion[]" class="form-control form-control-sm" v-model="item.descripcion_id" @change="setFormulas(materiales[index].descripcion_id,index)">
                <option v-for="descripcion in descripciones[index]" :value="descripcion.value">@{{ descripcion.label }}</option>
              </select>
            </td>
            <td>
              {!! Form::text('pselargo[]', null, ['class'=>'form-control form-control-sm','autocomplete' => 'off', 'v-model'=> 'item.largo']) !!}
            </td>
            <td>
              {!! Form::text('psealto[]', null, ['class'=>'form-control form-control-sm','autocomplete' => 'off', 'v-model' => 'item.alto']) !!}
            </td>
            <td>
              {!! Form::select('pseprofundidad[]', [3=>3,4=>4,6=>6,10=>10,12=>12,15=>15,16=>16,18=>18,19=>19], null, ['class'=>'form-control form-control-sm', 'v-model'=> 'item.profundidad']) !!}
            </td>
            <td>
              {!! Form::select('pselargo_izq[]', ['0.45'=>'0.45','1'=>'1','2'=>'2'], null, ['class'=>'form-control form-control-sm', 'v-model' => 'item.largo_izq']) !!}
            </td>
            <td>
              {!! Form::select('pselargo_der[]', ['0.45'=>'0.45','1'=>'1','2'=>'2'], null, ['class'=>'form-control form-control-sm', 'v-model' => 'item.largo_der']) !!}
            </td>
            <td>
              {!! Form::select('psealto_sup[]', ['0.45'=>'0.45','1'=>'1','2'=>'2'], null, ['class'=>'form-control form-control-sm', 'v-model' => 'item.alto_sup']) !!}
            </td>
            <td>
              {!! Form::select('psealto_inf[]', ['0.45'=>'0.45','1'=>'1','2'=>'2'], null, ['class'=>'form-control form-control-sm', 'v-model' => 'item.alto_inf']) !!}
            </td>
            <td>
              {!! Form::text('psemec1', null, ['class'=>'form-control form-control-sm','autocomplete' => 'off', 'v-model' => 'item.mec1']) !!}
            </td>
            <td>
              {!! Form::text('psemec2', null, ['class'=>'form-control form-control-sm','autocomplete' => 'off', 'v-model' => 'item.mec2']) !!}
            </td>
            <td>
              {!! Form::number('psecantidad[]', null, ['class'=>'form-control form-control-sm text-right','min'=>1, 'v-model' => 'item.cantidad']) !!}
            </td>
            <td>
              <a class="btn btn-link  align-middle text-danger" href="#" title="Eliminar" @click="removeRowMAT(index)" v-if="materiales.length > 1"><i class="fas fa-minus fa-xs"></i></a>
            </td>
          </tr>
          {{-- @endforeach --}}
        </tbody>
      </table>
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
  <a class="btn btn-warning text-danger" href="{{ url('/frontend/proyectos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
  {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script>
  var app = new Vue({
    el: '#app',

    created() {
      if(this.tipo_id > 0){
        axios.get('/subtiposFiltro/' + this.tipo_id)
        .then(response => {
          this.subtipos = response.data
        })
        .catch(function(error){
          console.log(error)
        })
      }
      axios.get('/ProyectoComplementos/' + '{{ $proyecto->id }}').then(response => { this.mtps = response.data }).catch(function(error){ console.log(error)});
      axios.get('/TiposMTP').then( response => { this.tiposMTP = response.data }).catch(function(error) { console.log(error) });
      axios.get('/getMateriales/' + '{{ $proyecto->id }}').then( response => { this.materiales = response.data }).catch(function(error){ console.log(error)});
      axios.get('/setMaterial/' + '{{ $proyecto->tipo_id }}' + '/' + '{{ $proyecto->subtipo_id }}').then( response => { this.materialesPSE = response.data }).catch(function(error){ console.log(error) });
    },

    data: {
      tipo_id: '{{ $proyecto->tipo_id }}',
      subtipo_id: '{{ $proyecto->subtipo_id }}',
      subtipos: [],
      tiposMTP: [],
      subtipoMTP: [],
      mtps: [],
      materiales: [],
      materialesPSE: [],
      descripciones: [],
    },

    watch: {
      mtps: function(){
        for (var i = 0; i < this.mtps.length; i++) {
          // console.log(this.mtps[i].mtp_tipo_id);
          axios.get('/mtpsubtipos/' + this.mtps[i].mtp_tipo_id)
          .then(response => {
            this.subtipoMTP.splice(i, 1, response.data)
            // console.log(this.subtipoMTP[i]);
          })
          .catch(function(error){
            console.log(error)
          })
        }
      },
      materiales: function(){
        for (var i = 0; i < this.materiales.length; i++) {
          if(this.materiales[i].material_id > 0){
            axios.get('/descripcionMaterial/' + this.materiales[i].material_id )
            .then( response => {
              this.descripciones.splice(i, 1, response.data);
            // console.log(response.data);
          })
            .catch(function(error){
              console.log(error)
            })
          }
        }
      }
    },

    methods: {
      addRowMTP: function (index) {
        this.mtps.splice(index + 1, 1, { tipo: null, subtipo: null, cantidad: 0 });
      },
      removeRowMTP: function(index){
        if( this.mtps.length > 1){
          this.mtps.splice(index, 1);
        }
      },
      addRowMAT: function (indice) {
        try {
          this.materiales.splice(indice + 1, 1, { material_id: '', descripcion: '', largo: '', alto: '', profundidad: '', largo_izq: '', largo_der: '', alto_sup: '', alto_inf: '', mec1: '', mec2: '', cant: 0 });
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
      getSubtipo: function(index,tipo){
        axios.get('/mtpsubtipos/' + tipo)
        .then( response => {
          this.subtipoMTP.splice(index, 1, response.data);
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
        this.descripciones[indice].filter(function(vars) {
          if(vars.value == index){
            row = vars;
          }
        })
        this.materiales[indice].descripcion_id = row.value;
        this.materiales[indice].alto = row.falto;
        this.materiales[indice].largo = row.flargo;
        this.materiales[indice].profundidad = row.profundidad;
      }
    }
  })
</script>
@endsection