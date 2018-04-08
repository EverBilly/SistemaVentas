<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ArticuloFormRequest;
use sisVentas\Articulo;
use DB;
    

class ArticuloController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
    	if($request)
    	{
    		$query = trim($request->get('searchText'));
    		$articulos=DB::table('articulo as a')
            ->join('categoria as c', 'a.idcategoria', '=', 'c.idcategoria')
    		->select('a.idarticulo', 'a.nombre', 'a.codigo_barras', 'a.stock', 'c.nombre as categoria', 'a.estado' )
    		->where('a.nombre', 'LIKE', '%'.$query.'%')
            ->orwhere('a.codigo_barras', 'LIKE', '%'.$query.'%')
    		->orderBy('a.idarticulo', 'desc')
    		->paginate(7);
    		return view('almacen.articulo.index',["articulos"=>$articulos
    			,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
    	return view("almacen.articulo.create",["categorias"=>$categorias]);
    }

    public function store(ArticuloFormRequest $request)
    {
    	$articulo = new Articulo;
    	$articulo->idcategoria=$request->get('idcategoria');
    	$articulo->codigo_barras=$request->get('codigo_barras');
    	$articulo->nombre=$request->get('nombre');
    	$articulo->stock=$request->get('stock');
    	$articulo->estado='Activo';
    	//$categoria->condicion='1';
    	$articulo->save();
    	return Redirect::to('almacen/articulo');
    }

    public function show($id)
    {
    	return view("almacen.articulo.show", ["articulo"=>Articulo::findOrFail($id)]);
    }

    public function edit($id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$categorias=DB::table('categoria')->where('condicion', '=', '1')->get();
    	return view("almacen.articulo.edit", ["articulo"=>$articulo,"categorias"=>$categorias]);
    }

    public function update(CategoriaFormRequest $request, $id)
    {
    	$categoria=Categoria::findOrFail($id);
    	$articulo->idcategoria=$request->get('idcategoria');
    	$articulo->codigo_barras=$request->get('codigo_barras');
    	$articulo->nombre=$request->get('nombre');
    	$articulo->stock=$request->get('stock');
    	$articulo->estado='Activo';
    	$categoria->condicion='1';
    	$articulo->save();
    	return Redirect::to('almacen/articulo');
    }

    public function destroy($id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$articulo->estado='Inactivo';
    	$articulo->update();
    	return Redirect::to('almacen/articulo');
    }
}
