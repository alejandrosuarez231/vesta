<div class="container">
	
	<div class="row">
		<table class="table table-inverse">
			<thead>
				<tr>
					<th>Descripcion</th>
					<th>Variantes</th>
					<th>Sist. de Apertura</th>
					<th>Tipos de Fondo</th>
					<th>Espesor Permitido</th>
					<th>Ancho Min</th>
					<th>Ancho Max</th>
					<th>Ancho Var</th>
					<th>Alto Min</th>
					<th>Alto Max</th>
					<th>Alto Var</th>
					<th>Profundidad Min</th>
					<th>Profundidad Max</th>
					<th>Profundidad Var</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@section('scripts')
<script type="text/javascript">
	$(function () {
		$('#modulos-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{!! route('data.moduloslista') !!}',
			columns: [
			{data: 'id', name: 'id', title: 'Id'},
			{data: 'descripcion', name: 'descripcion', title: 'Descripcion'},
			{data: 'variantes', name: 'variantes', title: 'Variantes', className: 'text-left'},
			{data: 'sap', name: 'sap', title: 'Sist. de Apertura', className: 'text-left'},
			{data: 'fondo_id', name: 'fondo_id', title: 'Tipos de Fondo', className: 'text-left'},
			{data: 'espesor_permitido', name: 'espesor_permitido', title: 'Espesor Permitido', className: 'text-left'},
			{data: 'ancho_minimo', name: 'ancho_minimo', title: 'Ancho Min', className: 'text-center'},
			{data: 'ancho_maximo', name: 'ancho_maximo', title: 'Ancho Max', className: 'text-center'},
			{data: 'ancho_var', name: 'ancho_var', title: 'Ancho Var', className: 'text-center'},
			{data: 'alto_minimo', name: 'alto_minimo', title: 'Alto Min', className: 'text-center'},
			{data: 'alto_maximo', name: 'alto_maximo', title: 'Alto Max', className: 'text-center'},
			{data: 'alto_var', name: 'alto_var', title: 'Alto Var', className: 'text-center'},
			{data: 'profundidad_minima', name: 'profundidad_minima', title: 'Profundidad Min', className: 'text-center'},
			{data: 'profundidad_maxima', name: 'profundidad_maxima', title: 'Profundidad Max', className: 'text-center'},
			{data: 'profundidad_var', name: 'profundidad_var', title: 'Profundidad Var', className: 'text-center'},
			{data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-left'}
			],
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
			}
		});
	});
</script>
@endsection