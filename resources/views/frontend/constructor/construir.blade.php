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
          {!! Form::select('tipo_id', \App\Tipo::whereNotIn('tipologia',['MTP','SER'])->pluck('nombre','id'), null, ['class' => 'form-control','placeholder' => 'TIPO', 'v-model' => 'tipo']) !!}
        </div>
        <div class="form-group mr-2" v-if="tipo > 10">
          <select class="form-control" name="subtipo_id" v-model="subtipo">
            <option value="" disabled>Selección</option>
            <option v-for="(item, index) in subtipos" :value="index">@{{ item }}</option>
          </select>
        </div>
        <div class="form-group">
          {!! Form::text('sku', 'SKU', ['class' => 'form-control','placeholder'=>'SKU']) !!}
        </div>
      </div>
      <!-- Nombre y Descripcion  -->
      <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control col-md-6','placeholder'=>'Nombre']) !!}
      </div>
      <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control col-md-6','size'=>'30x3','placeholder'=>'Descripción']) !!}
      </div>
      <!-- Propiedades PSE -->
      <div v-if="tipo > 0 && tipo < 11"><!-- Propiedades PSE -->
        <div class="form-row">
          <div class="form-group mr-2">
            {!! Form::text('largo', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Largo']) !!}
            {!! Form::text('largo_izq', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Largo IZQ']) !!}
            {!! Form::text('largo_der', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Largo DER']) !!}
          </div>
          <div class="form-group mr-2">
            {!! Form::text('ancho', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Ancho']) !!}
            {!! Form::text('ancho_sup', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Ancho SUP']) !!}
            {!! Form::text('ancho_inf', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Ancho INF']) !!}
          </div>
          <div class="form-group mr-2">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="pseveta[]">
              <label class="custom-control-label" for="pseveta[]">VETA</label>
            </div>
            {!! Form::text('mec1', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Mec1']) !!}
            {!! Form::text('mec2', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Mec2']) !!}
          </div>
        </div>
      </div>
      <!-- Propiedades PTO -->
      <div v-if="tipo > 10">
        <div class="form-row">
          <div class="form-group mr-1">
            {!! Form::text('ptolargo', null, ['class'=>'form-control text-uppercase','placeholder'=>'Largo']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::text('ptoancho', null, ['class'=>'form-control text-uppercase','placeholder'=>'Ancho']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::text('ptoprofundidad', null, ['class'=>'form-control text-uppercase','placeholder'=>'Profundidad']) !!}
          </div>
          <div class="form-group mr-1">
            {!! Form::select('ptocolor_id', \App\Colore::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Color']) !!}
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
                {!! Form::select('mtp[]', \App\Producto::with('tipo:id,tipologia')->get()->where('tipo.tipologia','=','MTP')->pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Materia Prima','v-model'=>'mtp.mtp']) !!}
              </td>
              <td width="20%">
                {!! Form::number('cantidad[]', null, ['class'=>'form-control text-right','placeholder'=>'Cantidad','min' => 1, 'v-model'=>'mtp.cantidad']) !!}
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
        <table class="table">
          <tbody>
            <tr v-for="(material, $indice) in materiales" track-by="$indice">
              <td>{!! Form::text('psesku[]', null, ['class'=>'form-control text-uppercase','placeholder'=>'SKU']) !!}</td>
              <td>
                {!! Form::select('material_id[]', \App\Materiale::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Material','title'=>'Material']) !!}
              </td>
              <td>
                {!! Form::select('psedescripcion[]', \App\Descripcione::pluck('descripcion','id'), null, ['class'=>'form-control', 'placeholder'=>'Descripcion','title'=>'Descripcion']) !!}
              </td>
              <td>
                {!! Form::text('pselargo[]', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Largo']) !!}
              </td>
              <td>
                {!! Form::text('pseancho[]', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Ancho']) !!}
              </td>
              <td>
                {!! Form::text('pseespesor[]', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'espesor']) !!}
              </td>
              <td>{!! Form::text('pselargo_izq[]', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Largo IZQ']) !!}</td>
              <td>{!! Form::text('pselargo_der[]', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Largo DER']) !!}</td>
              <td>{!! Form::text('pseancho_sup[]', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Ancho SUP']) !!}</td>
              <td>{!! Form::text('pseancho_inf[]', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Ancho INF']) !!}</td>
              <td>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="pseveta[]">
                  <label class="custom-control-label" for="pseveta[]">VETA</label>
                </div>
              </td>
              <td>{!! Form::text('psemec1[]', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Mec1']) !!}</td>
              <td>{!! Form::text('psemec2[]', null, ['class'=>'form-control text-uppercase mb-1','placeholder'=>'Mec2']) !!}</td>
              <td>{!! Form::number('psecantidad[]', null, ['class' => 'form-control', 'min' => 1, 'placeholder' =>'Cant']) !!}</td>
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