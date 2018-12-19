@extends('layouts.app')

@section('content')
<div id="app" class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Crear Codigo</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
      <div class="alert alert-warning col-md-4">
        EN Desarrollo
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
<script>
  var app = new Vue({
    el: '#app',
    data: {
      tipo: '',
      categorias: [],
      categoria_id: '',
      subcategorias: [],
      subcategoria_id: '',
      acronimo: '',
      tipologia: '',
      errors: []
    },
    methods: {
      getCategorias: function() {
        axios.get('/categoria/' + this.tipo)
        .then( response => {
          this.categorias = response.data;
        })
      },
      getSubcategorias: function() {
        axios.get('/subcategoria/' + this.categoria_id)
        .then( response => {
          this.subcategorias = response.data;
        })
      },
      crearCodigo: function() {
        var url = '/codigos';
        axios.post(url, {
          tipo: this.tipo,
          categoria_id: this.categoria_id,
          subcategoria_id: this.subcategoria_id,
          acronimo: this.acronimo,
          tipologia: this.tipologia
        }).then(response => {
          this.tipo = '';
          this.categoria_id = '';
          this.subcategoria_id = '';
          this.acronimo = '';
          this.tipologia = '';
          this.errors = [];
          swal({
            position: 'top-end',
            type: 'success',
            title: 'Codigo creado con éxito!',
            showConfirmButton: false,
            timer: 1500
          });
        }).catch(error => {
          this.errors = error.response.data;
          console.log(error.response.data);
        })
      }
    }
  })
</script>
@endsection
