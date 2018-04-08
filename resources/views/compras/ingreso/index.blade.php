@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><h3>Listado de Compras <button class="btn btn-default"><a href="ingreso/create"> Nuevo</a></h3></button>
			@include('compras.ingreso.search')
		</div> 
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Fecha</th>
						<td>Proveedor</td>
						<td>Tipo de Comprobante</td>
						<td>Ganancia</td>
						<td>Total</td>
						<td>Estado</td>
						<th>Opciones</th>
					</thead>
					@foreach($ingresos as $ing)
					<tr>
						<td>{{$ing->fecha_hora}}</td>
						<td>{{$ing->nombre}}</td>
						<td>{{$ing->tipo_comprobante.': '.$ing->serie_comprobante. ' - '.$ing->num_comprobante}}</td>
						<td>{{$ing->ganancia}}
						</td>
						<td>{{$ing->total}}
						</td>
						<td>{{$ing->estado}}
						</td>
						<td>
						<!--{{URL::action('IngresoController@show', $ing->idingreso)}}-->
						<a href="{{URL::action('IngresoController@show', $ing->idingreso)}}"><button class="btn btn-primary">Detalles</button></a>
						<a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
						</td>
					</tr>
					@include('compras.ingreso.modal')
					@endforeach
				</table>
			</div>
			{{$ingresos->render()}}
		</div>
	</div>
@endsection