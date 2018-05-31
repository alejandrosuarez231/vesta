@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4 class="text-primary">Orden de Compra <small class="text-info">Nueva</small></h4>
    </div>
  </div>

  {!! Form::open(['url'=>'/ordendecompras','method'=>'POST','name'=>'ordendecompra']) !!}
  <div class="row justify-content-center">
    <div class="col-md offset-2">
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('codigo', 'Codigo', ['class'=>'form-control-label']) !!}
          {!! Form::text('codigo', null, ['class'=>'form-control','placeholder'=>'CODIGO VESTA','v-model'=>'codigo']) !!}
          <span class="text-danger"><small>@if ($errors->has('codigo')) {{ $errors->first('codigo') }} @endif</small></span>
        </div>
        <div class="form-group mr-2">
          {!! Form::label('fecha', 'Fecha', ['class'=>'form-control-label']) !!}
          {!! Form::date('fecha', null, ['class'=>'form-control','v-model'=>'fecha']) !!}
          <span class="text-danger"><small>@if ($errors->has('fecha')) {{ $errors->first('fecha') }} @endif</small></span>
        </div>
        <div class="form-group mr-2">
          {!! Form::label('proveedor_id', 'Proveedor', ['class'=>'form-control-label']) !!}
          {!! Form::select('proveedor_id', \App\Proveedore::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Selección','v-model'=>'proveedor_id']) !!}
          <span class="text-danger"><small>@if ($errors->has('proveedor_id')) {{ $errors->first('proveedor_id') }} @endif</small></span>
        </div>
        <div class="form-group mr-2">
          {!! Form::label('prioridad', 'Prioridad', ['class'=>'form-control-label']) !!}
          {!! Form::select('prioridad', [0=>'Normal',1=>'Media',2=>'Importante'], 0, ['class'=>'form-control','v-model'=>'prioridad']) !!}
          <span class="text-danger"><small>@if ($errors->has('prioridad')) {{ $errors->first('prioridad') }} @endif</small></span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 offset-1">
      <table class="table" width="100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, $index) in rows">
            <td>@{{ $index +1 }}</td>
            <td>
              <v-select v-model="row.producto_id" :options="lists" name="producto_id" @click="getProductos()"></v-select>
              <input type="hidden" name="productos[]" :value="row.producto_id.value">
            </td>
            <td>
              <input type="number" class="form-control text-right" name="cantidad[]" v-model="row.cantidad" value="" placeholder="0">
            </td>
            <td class="text-center">
              <button type="button" class="btn btn-sm btn-primary" @click="addRow($index)">Agregar</button>
              <button type="button" class="btn btn-sm btn-danger" @click="removeRow($index)" v-if="rows.length > 1">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 offset-1">
      <hr>
      <button type="submit" class="btn btn-primary">Procesar</button>
      <a class="btn btn-warning ml-1" href="{{ url('/ordendecompras') }}" title="Cancelar">Cancelar</a>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  var app = new Vue({
    el: '#app',
    mounted(){
      axios.get('/getPro').then(response => { this.lists = response.data });
    },
    data: {
      codigo: '',
      fecha: '{{ \Illuminate\Support\Carbon::now()->format('Y-m-d') }}',
      proveedor_id: '',
      prioridad: 0,
      lists: [],
      rows: [
        { producto_id: '', cantidad: '' }
      ]
    },
    methods: {
      addRow: function(index){
        try {
          this.rows.splice(index + 1, 0, { producto_id: '', cantidad: '' });
        } catch(e) {
          console.log(e);
        }
      },
      removeRow: function(index){
        console.log(index);
        if( this.rows.length > 1){
          this.rows.splice(index, 1);
        }
      },
      submitForm: function(){
        axios.post('/ordendecompras', {
          codigo: this.codigo,
          fecha: this.fecha,
          proveedor_id: this.proveedor_id,
          detalles: this.rows
        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
      }
    }
  })
</script>
@endsection