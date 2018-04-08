@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Articulo: {{$articulo->nombre}}</h3>
			@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>
						{{$error}}
					</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::model($articulo,['method'=>'PATCH', 'route'=>['almacen.articulo.update',$articulo->idarticulo]])!!}
				{{Form::token()}}
				<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control" >
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="">Categoria</label>
					<select name="idcategoria" class="form-control">
						@foreach($categorias as $cat)
						@if($cat->idcategoria == $articulo->idcategoria)
							<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
							@else
							<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="codigo_barras">Codigo de Barras</label>
					<input type="text" name="codigo_barras" required value="{{$articulo->codigo_barras}}" class="form-control">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="stock">Articulos en Existencia</label>
					<input type="text" name="stock" required value="{{$articulo->stock}}" class="form-control">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>

			{!!Form::close()!!}
@endsection