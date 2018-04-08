@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><h3>Listado de Articulos <button class="btn btn-default"><a href="articulo/create"> Nuevo</a></h3></button>
			@include('almacen.articulo.search')
		</div> 
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<td>Codigo de Barras</td>
						<td>Tipo de Categoria</td>
						<td>Cantidad en Existencia</td>
						<td>Estado</td>
						<th>Opciones</th>
					</thead>
					@foreach($articulos as $art)
					<tr>
						<td>{{$art->idarticulo}}</td>
						<td>{{$art->nombre}}</td>
						<td>{{$art->codigo_barras}}</td>
						<td>{{$art->categoria}}</td>
						<td>{{$art->stock}}</td>
						<td>{{$art->estado}}</td>
						<td>
						<!--{{URL::action('ArticuloController@edit', $art->idarticulo)}}-->
						<a href=""><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('almacen.articulo.modal')
					@endforeach
				</table>
			</div>
			{{$articulos->render()}}
		</div>
	</div>
@endsection