@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Contructor</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  {!! Form::open(['route' => 'constructor.ensamble', 'method' => 'POST']) !!}
  <div class="row">
    <div class="col-md"><!-- Data Seleccion -->
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::select('tipo_id', \App\Tipo::where('tipologia','=','PTO')->pluck('nombre','id'), null, ['class' => 'form-control form-control-sm','placeholder' => 'TIPO', 'v-model' => 'tipo']) !!}
        </div>
        <div class="form-group mr-2" v-if="tipo > 10">
          <select class="form-control form-control-sm" name="subtipo_id" v-model="subtipo">
            <option value="" disabled>Selección</option>
            <option v-for="(item, index) in subtipos" :value="index">@{{ item }}</option>
          </select>
        </div>
        <div class="form-group">
          {!! Form::text('sku', 'SKU', ['class' => 'form-control form-control-sm','placeholder'=>'SKU']) !!}
        </div>
      </div>
      <!-- Nombre y Descripcion  -->
      <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control form-control-sm col-md-6','placeholder'=>'Nombre']) !!}
      </div>
      <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control form-control-sm col-md-6','size'=>'30x3','placeholder'=>'Descripción']) !!}
      </div>
      <!-- Propiedades PSE -->

      <!-- Propiedades PTO -->
      <div v-if="tipo > 10">
        <div class="form-row">
          <div class="form-group mr-1">
            {!! Form::text('ptolargo', null, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'Largo']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::text('ptoancho', null, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'Ancho']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::text('ptoprofundidad', null, ['class'=>'form-control form-control-sm text-uppercase','placeholder'=>'Profundidad']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::select('ptocolor_id', \App\Colore::pluck('nombre','id'), null, ['class'=>'form-control form-control-sm','placeholder'=>'Color']) !!}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md" v-if="tipo > 10">
      <div class="form-row">
        <legend>Materia Prima</legend>
        <table class="table">
          <tbody>
            <tr v-for="(mtp, $index) in mtps" track-by="$index">
              <td>
                {!! Form::select('mtp[]', \App\Producto::with('tipo:id,tipologia')->get()->where('tipo.tipologia','=','MTP')->pluck('nombre','id'), null, ['class'=>'form-control form-control-sm','placeholder'=>'Materia Prima','v-model'=>'mtp.mtp']) !!}
              </td>
              <td width="20%">
                {!! Form::number('cantidad[]', null, ['class'=>'form-control form-control-sm text-right','placeholder'=>'Cantidad','min' => 1, 'v-model'=>'mtp.cantidad']) !!}
              </td>
              <td>
                <a class="btn btn-link" href="#" title="Agregar" @click="addRowMTP($index)"><i class="fas fa-plus"></i></a>
                <a class="btn btn-link text-danger" href="#" title="Eliminar" @click="removeRowMTP($index)" v-if="mtps.length > 1"><i class="fas fa-minus"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row" v-if="tipo > 10">
    <div class="col-md">
      <div class="form-row">
        <legend>Materiales</legend>
        <table class="table" style="font-size: 0.9em;">
          <thead>
            <tr>
              <td>SKU</td>
              <td>Material</td>
              <td>Descripcion</td>
              <td>Largo</td>
              <td>Ancho</td>
              <td>Espesor</td>
              <td>LargoIZQ</td>
              <td>LargoDER</td>
              <td>AnchoSUP</td>
              <td>AnchoINF</td>
              <td>Veta</td>
              <td>Mec1</td>
              <td>Mec2</td>
              <td>Cantidad</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(material, $indice) in materiales" track-by="$indice">
              <td>{!! Form::text('psesku[]', null, ['class'=>'form-control form-control-sm text-uppercase','title'=>'SKU']) !!}</td>
              <td>
                {!! Form::select('material_id[]', \App\Materiale::pluck('nombre','id'), null, ['class'=>'form-control form-control-sm','title'=>'Material', 'placeholder' =>'Sel']) !!}
              </td>
              <td>
                {!! Form::select('psedescripcion[]', \App\Descripcione::pluck('descripcion','id'), null, ['class'=>'form-control form-control-sm', 'title'=>'Descripcion', 'placeholder' =>'Sel']) !!}
              </td>
              <td>
                {!! Form::text('pselargo[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Largo']) !!}
              </td>
              <td>
                {!! Form::text('pseancho[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Ancho']) !!}
              </td>
              <td>
                {!! Form::text('pseespesor[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'espesor']) !!}
              </td>
              <td>
                <select class="form-control form-control-sm" name="pselargo_izq[]">
                  <option value="0" selected>Sel</option>
                  <option value="0.45" >0.45</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                </select>
              </td>
              <td>
                <select class="form-control form-control-sm" name="pselargo_der[]">
                  <option value="0" selected>Sel</option>
                  <option value="0.45" >0.45</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                </select>
              </td>
              <td>
                <select class="form-control form-control-sm" name="pseancho_sup[]">
                  <option value="0" selected>Sel</option>
                  <option value="0.45" >0.45</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                </select>
              </td>
              <td>
                <select class="form-control form-control-sm" name="pseancho_inf[]">
                  <option value="0" selected>Sel</option>
                  <option value="0.45" >0.45</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                </select>
              </td>
              <td>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="pseveta[]">
                  <label class="custom-control-label" for="pseveta[]">Si/No</label>
                </div>
              </td>
              <td>{!! Form::text('psemec1[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Mec1']) !!}</td>
              <td>{!! Form::text('psemec2[]', null, ['class'=>'form-control form-control-sm text-uppercase mb-1','autocomplete' => 'off', 'title'=>'Mec2']) !!}</td>
              <td>{!! Form::number('psecantidad[]', null, ['class' => 'form-control form-control-sm', 'min' => 1, 'title' =>'Cant']) !!}</td>
              <td>
                <a class="btn btn-link" href="#" title="Agregar" @click="addRowMAT($indice)"><i class="fas fa-plus"></i></a>
                <a class="btn btn-link text-danger" href="#" title="Eliminar" @click="removeRowMAT($indice)" v-if="materiales.length > 1"><i class="fas fa-minus"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
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

    data: {
      tipo: '',
      subtipos: '',
      subtipo: '',
      mtps: [{ mtp: '', cantidad: '' }],
      materialMatriz: '',
      materiales: [{ sku: '', material_id: '', nombre: '', largo_izq: '', largo_der: '', ancho_sup: '', ancho_inf: '', veta: '', mec1: '', mec2: '' }]
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
      addRowMTP: function (index) {
        if(this.mtps[index].cantidad = ''){
          alert('Indique la cantidad');
        }
        try {
          this.mtps.splice(index + 1, 0, {});
        } catch(e)
        {
          console.log(e);
        }
      },
      removeRowMTP: function(index){
        console.log(index);
        if( this.mtps.length > 1){
          this.mtps.splice(index, 1);
        }
      },
      addRowMAT: function (indice) {
        try {
          this.materiales.splice(indice + 1, 0, {});
        } catch(e)
        {
          console.log(e);
        }
      },
      removeRowMAT: function(indice){
        console.log(indice);
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
      }
    },

  })
</script>
@endsection