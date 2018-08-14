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
    <div class="col-md"><!-- Data Seleccion -->
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::select('tipo_id', \App\Tipo::where('tipologia','=','PTO')->pluck('nombre','id'), null, ['disabled','class' => 'form-control form-control-sm','placeholder' => 'TIPO', 'v-model' => 'tipo']) !!}
        </div>
        <div class="form-group mr-2" v-if="tipo > 10 && tipo < 15">
          <select disabled class="form-control form-control-sm" name="subtipo_id" v-model="subtipo" @change="getSkuBase">
            <option value="" disabled>Selección</option>
            <option v-for="(item, index) in subtipos" :value="index">@{{ item }}</option>
          </select>
        </div>
        <div class="form-group">
          {!! Form::text('sku', 'SKU', ['disabled','class' => 'form-control form-control-sm','placeholder'=>'SKU','v-model'=>'ptosku']) !!}
        </div>
      </div>
      <!-- Nombre y Descripcion  -->
      <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control form-control-sm col-md-6','placeholder'=>'Nombre','v-model' => 'nombre']) !!}
      </div>
      <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control form-control-sm col-md-6','size'=>'30x3','placeholder'=>'Descripción', 'v-model' => 'descripcion']) !!}
      </div>
      <!-- Propiedades PSE -->

      <!-- Propiedades PTO -->
      <div v-if="tipo > 10">
        <div class="form-row">
          <div class="form-group mr-1">
            {!! Form::text('ptolargo', null, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'Largo', 'v-model' => 'largo']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::text('ptoancho', null, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'Ancho', 'v-model' => 'ancho']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::text('ptoespesor', null, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'Profundidad', 'v-model' => 'espesor']) !!}
          </div>
          {{-- <div class="form-group mr-1">
            {!! Form::select('ptocolor_id', \App\Colore::pluck('nombre','id'), null, ['class'=>'form-control form-control-sm','placeholder'=>'Color']) !!}
          </div> --}}
        </div>
      </div>
    </div>
    <div class="col-md" v-if="tipo > 10">
      <div class="form-group">
        <legend>Complementos</legend>
        <div class="form-group">
          <table class="table" style="font-size: 0.9em;">
            <thead>
              <tr>
                <th width="2%">Item</th>
                <th>Tipo</th>
                <th>SubTipo</th>
                <th>Cantidad</th>
                <th><a class="btn btn-link" href="#" title="Agregar" @click="addRowMTP(this.app.mtps.length -1)"><i class="fas fa-plus"></i></a></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(mtp, $index) in mtps" track-by="$index">
                <td>
                  @{{ $index + 1 }}
                  {!! Form::hidden('mtp_id[]', null, ['v-model'=>'mtp.mtp_id']) !!}
                  {!! Form::hidden('mtp_producto_id[]', null, ['v-model'=>'mtp.mtp_producto_id']) !!}
                </td>
                <td>
                  <select class="form-control form-control-sm" name="mtp_tipo_id[]" v-model="mtp.mtp_tipo_id" @change="getSubtipo($index,mtps[$index].tipo)">
                    <option v-for="(tipo, indice) in tipos" :value="tipo.value">@{{ tipo.label }}</option>
                  </select>
                </td>
                <td>
                  <select class="form-control form-control-sm" name="mtp_subtipo_id[]" v-model="mtp.mtp_subtipo_id">
                    <option value="" selected disabled>Subtipo</option>
                    <option v-for="(subtipo, indice) in mtpsList[$index]" :value="subtipo.value">@{{ subtipo.label }}</option>
                  </select>
                </td>
                <td width="30%">
                  {!! Form::number('mtp_cantidad[]', null, ['class'=>'form-control form-control-sm text-right','placeholder'=>'Cantidad','min' => 1, 'v-model'=>'mtp.mtp_cantidad']) !!}
                </td>
                <td>
                  <a class="btn btn-link text-danger" href="#" title="Eliminar" @click="removeRowMTP($index)" v-if="mtps.length > 1"><i class="fas fa-minus"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row" v-if="tipo > 10">
    <div class="col-md">
      <div class="form-row">
        <legend>Piezas</legend>
        <table class="table" style="font-size: 0.9em;">
          <thead>
            <tr>
              <td>Material</td>
              <td>Descripcion</td>
              <td>Largo</td>
              <td>Ancho</td>
              <td>Espesor</td>
              <td>LargoIZQ</td>
              <td>LargoDER</td>
              <td>AnchoSUP</td>
              <td>AnchoINF</td>
              <td width="8%">Mec1</td>
              <td width="8%">Mec2</td>
              <td width="5%">Cantidad</td>
              <td>
                <a class="btn btn-link float-right" href="#" title="Agregar" @click="addRowMAT(this.app.materiales.length -1)"><i class="fas fa-plus"></i></a>
              </td>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(material, $indice) in materiales" track-by="$indice">
              <td>
                {!! Form::select('material_id[]', \App\Materiale::pluck('nombre','id'), null, ['class'=>'form-control form-control-sm','title'=>'Material', 'placeholder' =>'Sel','v-model'=>'material.material_id','@change' => 'filterMaterial(materiales[$indice].material_id,$indice)']) !!}
              </td>
              <td>
                <select name="psedescripcion[]" class="form-control form-control-sm" v-model="material.descripcion_id" @change="setFormulas(materiales[$indice].descripcion,$indice)">
                  <option value="" selected disabled>Selección</option>
                  <option v-for="(descripcion, index) in descripciones[$indice]" :value="index">@{{ descripcion.descripcion }}</option>
                </select>
              </td>
              <td>
                {!! Form::text('pselargo[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Largo','v-model'=>'material.largo']) !!}
              </td>
              <td>
                {!! Form::text('pseancho[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Ancho','v-model' => 'material.ancho']) !!}
              </td>
              <td>
                {!! Form::select('pseespesor[]', [3,4,6,10,12,15,16,18,19,20,25], null, ['class'=>'form-control form-control-sm', 'placeholder'=>'']) !!}
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
                <select class="form-control form-control-sm" name="pseancho_sup[]" v-model="material.ancho_sup">
                  <option value="0.45" >0.45</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                </select>
              </td>
              <td>
                <select class="form-control form-control-sm" name="pseancho_inf[]" v-model="material.ancho_inf">
                  <option value="0.45" >0.45</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                </select>
              </td>
              <td>{!! Form::text('psemec1[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Mec1','v-model'=>'material.mec1']) !!}</td>
              <td>{!! Form::text('psemec2[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Mec2','v-model'=>'material.mec2']) !!}</td>
              <td>{!! Form::number('psecantidad[]', null, ['class' => 'form-control form-control-sm text-right', 'min' => 1, 'title' =>'Cant', 'v-model' => 'material.cantidad']) !!}</td>
              <td>
                <a class="btn btn-link text-danger" href="#" title="Eliminar" @click="removeRowMAT($indice)" v-if="materiales.length > 1"><i class="fas fa-minus"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
  <a class="btn btn-warning text-danger" href="{{ url('/frontend/proyectos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
  {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var app = new Vue({
    el: '#app',

    created(){
      axios.get('/TiposMTP').then( response => { this.tipos = response.data }).catch(function(error) { console.log(error) });
      axios.get('/materiales').then( response => { this.materialMatriz = response.data }).catch(function(error) { console.log(error) });
      axios.get('/subtipos/' + this.tipo).then( response => { this.subtipos = response.data }).catch(function(error) { console.log(error) });
      axios.get('/ProyectoComplementos/' + '{{ $proyecto->id }}').then( response => { this.mtps = response.data }).catch(function(error){ console.log(error)});
      axios.get('/getMateriales/' + {{ $proyecto->id }}).then( response => { this.materiales = response.data }).catch(function(error){ console.log(error)});
    },

    data: {
      producto: '{{ $proyecto->id }}',
      ptosku: '{{ $proyecto->sku }}',
      tipo: '{{ $proyecto->tipo_id }}',
      tipos: '',
      subtipos: '',
      subtipo: '{{ $proyecto->subtipo_id }}',
      nombre: '{{ $proyecto->nombre }}',
      descripcion: '{{ $proyecto->descripcion }}',
      largo: '{{ $proyecto->largo }}',
      ancho: '{{ $proyecto->ancho }}',
      espesor: '{{ $proyecto->espesor }}',
      base: '',
      basesku: '',
      numeracion: '',
      mtpsList: [],
      mtps: [{ mtp_id: '', mtp_producto_id:'', mtp_tipo_id: '', _mtp_subtipo_id: '', mtp_cantidad: '' }],
      materialMatriz: '',
      descripciones: [],
      materiales: [{ material_id: '', descripcion: '', largo: '', ancho: '', espesor: '', largo_izq: '', largo_der: '', ancho_sup: '', ancho_inf: '', veta: '', mec1: '', mec2: '', cantidad: '' }]
    },

    watch: {
      tipo: function(){
        if(this.tipo > 0){
          axios.get('/subtipos/' + this.tipo)
          .then( response => {
            this.subtipos = response.data;
          })
        }
      },
      mtps: function(){
        if(this.mtps.length > 0){
          for (var i = 0; i <= this.mtps.length - 1; i++) {
            this.getSubtipo(i, this.mtps[i].tipo);
          }
        }
      },
      materiales: function(){
        if(this.materiales.length > 0){
          for (var i = 0; i <= this.materiales.length - 1; i++) {
            this.filterMaterial(this.materiales[i].material_id, i);
            // console.log(i);
          }
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
          this.materiales.splice(indice + 1, 1, { material_id: '', descripcion: '', largo: '', ancho: '', espesor: '', largo_izq: '', largo_der: '', ancho_sup: '', ancho_inf: '', veta: '', mec1: '', mec2: '', cant: '' });
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
        })
        .catch(function(error) {
          console.log(error);
        })
      },
      filterMaterial: function(material,indice){
        /* Metodo para chequear */
        axios.get('/setMaterial/' + material )
        .then( response => {
          this.descripciones.splice(indice, 1, response.data);
        })
        .catch(function(error){
          console.log(error)
        })
      },
      setFormulas: function(index,indice){
        // this.materiales[indice].descripcion = index;
        this.materiales[indice].ancho = this.descripciones[indice][index].ancho;
        this.materiales[indice].largo = this.descripciones[indice][index].largo;
        this.materiales[indice].espesor = this.descripciones[indice][index].espesor;
      },
      getSubtipo: function(index,tipo){
        axios.get('/mtpsubtipos/' + tipo)
        .then( response => {
          this.mtpsList.splice(index, 1, response.data);
        })
        .catch(function(error) {
          console.log(error)
        });
      }
    },

  })
</script>
@endsection