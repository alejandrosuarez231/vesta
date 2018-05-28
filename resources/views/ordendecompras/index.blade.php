@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Ordenes de Compras</h4>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('ordendecompras.create') }}" class="nav-link">Nuevo</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <caption>Ordenes de compra</caption>
          <thead>
            <tr>
              <th>ID</th>
              <th>Codigo</th>
              <th>Fecha</th>
              <th>Proveedor</th>
              <th>Prioridad</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ordenes as $element)
            <tr>
              <td>{{ $element->id }}</td>
              <td>{{ $element->codigo }}</td>
              <td>{{ $element->fecha }}</td>
              <td>{{ $element->proveedor->nombre }}</td>
              <td>{{ $element->prioridad }}</td>
              <td>
                <a href="#" class="btn btn-sm btn-info" title="Ver" data-toggle="modal" data-target=".bd-example-modal-lg" @click="getDetalles({{ $element->id }})">Detalles</a>
                @if ($element->aprobada == 0)
                <a href="#" class="btn btn-sm btn-warning" title="Editar">Editar</a>
                <a href="{{ route('odc.aprobar',['id'=> $element->id]) }}" class="btn btn-sm btn-success" title="Aprobar">Aprobar {{ $element->aprobada }}</a>
                <a href="#" class="btn btn-sm btn-danger" title="Anular">Anular</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $ordenes->links() }}
      </div>
    </div>
  </div>

  <div id="app" class="row justify-content-center">
    <div class="col-md">
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <template>
              <b-table striped hover :items="items" :fields="fields"></b-table>
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
<script>
  export default {
  data () {
    return {
      // Note 'isActive' is left out and will not appear in the rendered table
      fields: [ 'first_name', 'last_name', 'age' ],
      items: [
        { isActive: true, age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
        { isActive: false, age: 21, first_name: 'Larsen', last_name: 'Shaw' },
        { isActive: false, age: 89, first_name: 'Geneva', last_name: 'Wilson' },
        { isActive: true, age: 38, first_name: 'Jami', last_name: 'Carney' }
      ]
    }
  }
}
</script>
@endsection