@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md">
			<h3>Piezas {{ $piezas->first()->modulo->sku_grupo }}</h3>
			<ul class="nav">
				@if ($piezas->where('descripcion',null)->count() > 0)
				<li class="nav-item">
					<a href="{{ url()->previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
				</li>
				<li>
					<a href="{{ route('piezassku.piezas.generadescripcion',['modulo_id' => $modulo_id]) }}" class="btn btn-sm btn-light" title="">Generar Descripcion</a>
				</li>
				@else
				<li class="nav-item">
					<a href="{{ url('backend/modulos') }}" class="btn btn-link" title="Inicio">Regresar</a>
				</li>
				@endif
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-md">
			{{-- {{ dd($piezas->first()->modulo->sku_grupo) }} --}}
			<table class="table table-inverse table-striped">
				<thead>
					<tr>
						<th>SKU/Padre</th>
						<th>Pieza</th>
						<th>Material</th>
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
						<td>
							{{ @$element->skulistado->sku_padre }}
						</td>
						<td>{{$element->pieza_modulo->tipo_pieza}}</td>
						<td>{{$element->materiale->nombre}}</td>
						<td>{{$element->largo}}</td>
						<td>{{$element->largo_sup}}</td>
						<td>{{$element->largo_inf}}</td>
						<td>{{$element->ancho}}</td>
						<td>{{$element->ancho_izq}}</td>
						<td>{{$element->ancho_der}}</td>
						<td>{{$element->mecanizado1}}</td>
						<td>{{$element->mecanizado2}}</td>
						<td class="text-right">{{$element->cantidad}}</td>
						<td><small>{{$element->creado->name}}</small></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
