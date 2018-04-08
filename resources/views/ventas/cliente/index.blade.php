@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><h3>Listado de Clientes <button class="btn btn-default"><a href="cliente/create"> Nuevo</a></h3></button>
			@include('ventas.cliente.search')
		</div> 
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<td>Tipo de Documento</td>
						<td>Numero de Documento</td>
						<td>Telefono</td>
						<td>Email</td>
						<th>Opciones</th>
					</thead>
					@foreach($personas as $per)
					<tr>
						<td>{{$per->idpersona}}</td>
						<td>{{$per->nombre}}</td>
						<td>{{$per->tipo_documento}}</td>
						<td>{{$per->num_documento}}</td>
						<td>{{$per->telefono}}</td>
						<td>{{$per->email}}</td>
						<td>
						<!--{{URL::action('ClienteController@edit', $per->idpersona)}}-->
						<a href=""><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('ventas.cliente.modal')
					@endforeach
				</table>
			</div>
			{{$personas->render()}}
		</div>
	</div>
@endsection