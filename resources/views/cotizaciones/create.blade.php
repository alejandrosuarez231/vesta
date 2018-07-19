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
    <div class="col-md-4">
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
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Modulos</h5>
          <div class="row">
            <div class="col-md">
              <button type="button" class="btn btn-sm btn-primary" @click="addRowMAT($indice)">Añadir Modulo</button>
            </div>
            <div class="col-md-10">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tipologia</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Propiedades</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Banda</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="form-row">
                    <div class="form-group mt-2 mr-2">
                      {!! Form::select('tipo_id', \App\Tipo::where('tipologia','=','PTO')->pluck('nombre','id'), null, ['class' => 'form-control','placeholder'=>'Indique el Tipo','v-model' => 'tipo']) !!}
                    </div>
                    <div class="form-group mt-2 mr-2">
                      <select class="form-control" name="subtipo_id" v-model="subtipo">
                        <option value="" disabled>Indique el SubTipo</option>
                        <option v-for="(item, index) in subtipos" :value="index">@{{ item }}</option>
                      </select>
                    </div>
                    <div class="form-group mt-2 mr-2">
                      {!! Form::text('modulo', 'Modulo', ['class'=>'form-control','placeholder'=>'Modulo']) !!}
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="form-row">
                    <div class="form-group mt-2 mr-2">
                      {!! Form::text('ancho', null, ['class'=>'form-control','placeholder'=>'ANCHO']) !!}
                    </div>
                    <div class="form-group mt-2 mr-2">
                      {!! Form::text('alto', null, ['class'=>'form-control','placeholder'=>'ALTO']) !!}
                    </div>
                    <div class="form-group mt-2 mr-2">
                      {!! Form::text('profundo', null, ['class'=>'form-control','placeholder'=>'PROFUNDO']) !!}
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group mt-2 mr-2">
                      {!! Form::text('herraje', null, ['class'=>'form-control','placeholder'=>'Tipo/Herraje']) !!}
                    </div>
                    <div class="form-group mt-2 mr-2">
                      {!! Form::text('tirador', null, ['class'=>'form-control','placeholder'=>'Tirador']) !!}
                    </div>
                    <div class="form-group mt-2 mr-2">
                      {!! Form::text('posiciontirador', null, ['class'=>'form-control','placeholder'=>'Tirador/Posicion']) !!}
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="form-row">
                    <div class="form-group mt-2 mr-2">
                      {!! Form::select('banda', ['-1'=>'Crear banda', '1'=>'Banda 1', '2'=>'Banda 2'], null, ['class'=>'form-control','v-model'=>'banda','placeholder'=>'Inidique la Banda']) !!}
                    </div>
                    <div class="form-group mt-2 mr-2" v-if="banda == -1 ">
                      {!! Form::text('nuevabanda', null, ['class'=>'form-control','placeholder'=>'Nueva Banda']) !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
            <th>Codigo</th>
            <th>Codigo/Padre</th>
            <th>Descripción</th>
            <th>Banda</th>
            <th>Herraje</th>
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
          <tr v-for="(material, $indice) in materiales" track-by="$indice">
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
            <td><a class="btn btn-link text-danger" href="#" title="Eliminar" @click="removeRowMAT($indice)" v-if="materiales.length > 1"><i class="fas fa-minus"></i></a></td>
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
      ptosku: '',
      tipo: '',
      subtipos: '',
      subtipo: '',
      base: '',
      basesku: '',
      numeracion: '',
      mtps: [{ mtp: '', cantidad: '' }],
      materialMatriz: '',
      materiales: [{ sku: '', material_id: '', nombre: '', largo_izq: '', largo_der: '', ancho_sup: '', ancho_inf: '', veta: '', mec1: '', mec2: '' }],
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
      },
      getSkuBase: function(){
        axios.get('/getBaseSku/' + this.tipo + '/' + this.subtipo)
        .then( response => {
          console.log(response.data);
          this.numeracion = response.data[0].numeracion;
          this.base = response.data[0].skubase;
          this.ptosku = this.base;
        })
        .catch(function(error) {
          console.log(error)
        })
      },
    },

  })
</script>
@endsection