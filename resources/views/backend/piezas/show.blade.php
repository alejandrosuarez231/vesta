@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md">
			<h3>Piezas</h3>
			<ul class="nav">
				<li class="nav-item">
					<a href="{{ url()->previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-md">
			{{-- {{ dd($piezas) }} --}}
			<table class="table table-inverse">
				<thead>
					<tr>
						<th>Pieza</th>
						<th>Material</th>
						<th>Descripcion</th>
						<th>Largo</th>
						<th>Largo <sup>SUP</sup></th>
						<th>Largo <sup>INF</sup></th>
						<th>Ancho</th>
						<th>Ancho <sup>IZQ</sup></th>
						<th>Ancho <sup>DER</sup></th>
						<th>Mecanizado 1</th>
						<th>Mecanizado 2</th>
						<th>Cantidad</th>
						<th>Creado Por</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($piezas as $element)
					<tr>
						<td>{{$element->pieza_modulo->tipo_pieza}}</td>
						<td>{{$element->materiale->nombre}}</td>
						<td>{{$element->descripcion}}</td>
						<td>{{$element->largo}}</td>
						<td>{{$element->largo_sup}}</td>
						<td>{{$element->largo_inf}}</td>
						<td>{{$element->ancho}}</td>
						<td>{{$element->ancho_izq}}</td>
						<td>{{$element->ancho_der}}</td>
						<td>{{$element->mecanizado1}}</td>
						<td>{{$element->mecanizado2}}</td>
						<td class="text-right">{{$element->cantidad}}</td>
						<td>{{$element->created_by}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
