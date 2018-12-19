@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h3>Grupo en el inventario</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Grupo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($grupos as $element)
					<tr>
						<td>{{ $element['id'] }}</td>
						<td>{{ $element['nombre'] }}</td>
						<td>
							<a class="btn btn-sm btn-success" href="{{ route('inventario.show',['groupid'=>$element['id']]) }}">Ver Grupo</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection