@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><h3>Listado de Proveedores <button class="btn btn-default"><a href="proveedor/create"> Nuevo</a></h3></button>
			@include('compras.proveedor.search')
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
						<!--{{URL::action('ProveedorController@edit', $per->idpersona)}}-->
						<a href=""><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('compras.proveedor.modal')
					@endforeach
				</table>
			</div>
			{{$personas->render()}}
		</div>
	</div>
@endsection