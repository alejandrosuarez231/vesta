@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Nueva Compra</h4>
      <ul class="nav">
        <li class="nav-item">
          {{-- <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#detalles" title="Cargar Orden de Compra">Cargar</a> --}}
        </li>
      </ul>
    </div>
  </div>
  {!! Form::open(['url'=>'/compras','method'=>'POST']) !!}
  <div class="row">
    <div class="col-md-4 offset-md-2">
      <div class="form-row">
        <div class="form-group mr-3">
          {!! Form::label('fecha', 'Fecha', ['class'=>'form-control-label']) !!}
          {!! Form::date('fecha', \Illuminate\Support\Carbon::now(), ['class'=>'form-control','v-validate'=>"'required'",'required']) !!}
          {!! $errors->first('fecha', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-3">
          {!! Form::label('ordendecompra_id', 'Orden/Compra', ['class'=>'form-control-label']) !!}
          {!! Form::number('ordendecompra_id', null, ['class'=>'form-control text-right','min'=>0,'v-model'=>'orden']) !!}
          <span v-if="error" class="text-danger"><small>@{{ error }}</small></span>
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('proveedore_id', 'Proveedor', ['class'=>'form-control-label']) !!}
        <v-select v-model="proveedore_id" :options="provlists" placeholder="Selección" v-validate="'required'" required></v-select>
        <input type="hidden" name="proveedore_id" :value="proveedore_id.value">
        {!! $errors->first('proveedore_id', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-row">
        <div class="form-group">
          {!! Form::label('prioridad', 'Prioridad', ['class'=>'form-control-label']) !!}
          {!! Form::select('prioridad', [0=>'Normal',1=>'Media',2=>'Importante'], 0, ['class'=>'form-control','v-model'=>'prioridad']) !!}
          {!! $errors->first('prioridad', '<small class="help-block text-danger">:message</small>') !!}
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <table class="table" width="100%">
        <thead>
          <tr>
            <th width="3%">#</th>
            <th width="45%">Producto</th>
            <th width="15%">Cantidad</th>
            <th width="20%">Precio</th>
            <th v-bind:class="{ 'd-none': orden != 0 }"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, $index) in rows">
            <td>@{{ $index +1 }}</td>
            <td>
              <v-select :options="lists" label="label" v-model="row.producto"></v-select>
              <input type="hidden" name="producto_id[]" :value="row.producto.value">
              {!! $errors->first('producto_id[]', '<small class="help-block text-danger">:message</small>') !!}
            </td>
            <td>
              <input type="number" class="form-control text-right" name="cantidad[]" v-model="row.cantidad" value="" placeholder="0" v-validate="'required'" required>
            </td>
            <td>
              <input type="number" class="form-control text-right" name="precio[]" v-model="row.precio" step="any" value="" placeholder="0" v-validate="'required'" required>
              {!! $errors->first('precio[]', '<small class="help-block text-danger">:message</small>') !!}
            </td>
            <td v-bind:class="{ 'd-none': orden != 0 }" class="text-center">
              <button type="button" class="btn btn-sm btn-primary" title="Agregar" @click="addRow($index)"><i class="fas fa-plus"></i></button>
              <button type="button" class="btn btn-sm btn-danger" title="Eliminar" @click="removeRow($index)" v-if="rows.length > 1"><i class="fas fa-minus"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning" href="{{ url('/compras') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  const toast = swal.mixin({
    toast: true,
    position: 'middle',
    showConfirmButton: false,
    timer: 3000
  });

  var app = new Vue({
    el: '#app',
    created: function(){
      axios.get('/proveedoresList').then( response => { this.provlists = response.data });
      axios.get('/getPro').then(response => { this.lists = response.data });
    },
    data: {
      orden: 0,
      ordendetalle: '',
      proveedore_id: '',
      provlists: [],
      prioridad: 0,
      lists: [],
      productos: '',
      rows: [{ producto: '', cantidad: '', precio:'' }],
      error: ''
    },
    methods: {
      addRow: function(index){
        try {
          if(this.rows[index].producto !="" && this.rows[index].cantidad !="" && this.rows[index].precio){
            this.rows.splice(index + 1, 0, { producto: '', cantidad: '', precio: '' });
          }else{
            toast({ type:'warning', title: 'No puede agregar campos vacios'});
          }
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
      clearRows: function(){}
    },
    watch: {
      orden: function(val){
        if(val > 0){
          axios.get('/loadOrden/' + val)
          .then( response => {
            for (var i = response.data.length - 1; i >= 0; i--) {
              this.rows.push({ producto: { label: response.data[i].producto.nombre, value: response.data[i].producto.id }, cantidad: response.data[i].cantidad, precio:'' });
            }
            if(response.data.length == 0){
              this.error = 'No existe la Orden o fue procesada';
              this.rows = [{ producto: '', cantidad: '', precio:'' }];
              toast({ type:'warning', title: 'Verifique el numero de Orden'});
            }
            console.log(response.data);
          });
          this.$delete(this.rows,0);
        }else if(val == 0) {
          this.rows = [{ producto: '', cantidad: '', precio:'' }];
          console.info('No hay orden');
        }
      }
    }
  })
</script>
@endsection