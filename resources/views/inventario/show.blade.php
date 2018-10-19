@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<ul class="nav">
				<li class="nav-item">
					<a href="{{ url('/inventario') }}" class="btn btn-link" title="Inicio">Regresar</a>
				</li>
			</ul>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>nombre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($items as $element)
					<tr>
						<td>{{ $element['item_id'] }}</td>
						<td>{{ $element['name'] }}</td>
						<td></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection