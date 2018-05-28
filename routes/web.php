<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Categorias */
Route::resource('/categorias','CategoriaController');
/* Sub Categorias*/
Route::resource('/subcategorias','SubcategoriaController');
/* Unidades */
Route::resource('/unidades', 'UnidadController');
/* Codigos */
Route::resource('/codigos', 'CodigoController');
Route::get('/categoria/{tipo}', function($tipo) {
  $categorias = \App\Categoria::where('tipo','=',$tipo)->selectRaw('nombre AS label, id AS value')->get();
  return $categorias;
})->name('getCategorias');
Route::get('/subcategoria/{id}', function($id) {
  $subcategorias = \App\Subcategoria::where('categoria_id',$id)->selectRaw('nombre AS label, id AS value')->get();
  return $subcategorias;
})->name('getSubcategorias');

/* Proveedores */
Route::resource('/proveedores', 'ProveedoreController');
/* Materia Prima */
Route::resource('/productos', 'ProductoController');
/* Ordenes de compras */
Route::resource('/ordendecompras', 'OrdendecompraController');
Route::get('/odcAprobar/{id}', 'UtilController@ordenCompraAprobar')->name('odc.aprobar');
Route::get('/ordendecompras/odcdetalles/create', 'OrdendecompradetalleController@create')->name('odcdetalles.create');


/* Route for Vue */
Route::get('/getMT', function() {
  return \DB::table('mtps')->selectRaw('nombre AS label, id AS value')->get();
});
Route::get('/getODCD/{id}', 'UtilController@ordenDetalles')->name('getODCD');


/* Factory's */
Route::get('/newProveedores', function() {
  $proveedores = factory(App\Proveedore::class, 25)->make();
  foreach ($proveedores as $value) {
    $proveedor = new \App\Proveedore;
    $proveedor->fiscalid = $value->fiscalid;
    $proveedor->nombre = $value->nombre;
    $proveedor->direccion = $value->direccion;
    $proveedor->telefonos = $value->telefonos;
    $proveedor->email = $value->email;
    $proveedor->website = $value->website;
    $proveedor->credito = $value->credito;
    $proveedor->save();
  }
  return redirect('/proveedores');
});