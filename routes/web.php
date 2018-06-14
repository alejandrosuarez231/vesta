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
Route::resource('/tipos','TipoController');
/* Sub Categorias*/
Route::resource('/subtipos','SubtipoController');
/* Unidades */
Route::resource('/unidades', 'UnidadController');
/* Codigos */
Route::resource('/codigos', 'CodigoController');
Route::get('/tipo/{tipo}', function($tipo) {
  $tipos = \App\Tipo::where('tipo','=',$tipo)->selectRaw('nombre AS label, id AS value')->get();
  return $tipos;
})->name('getTipos');
Route::get('/subtipos/{id}', function($id) {
  $subtipos = \App\Subtipo::where('tipo_id',$id)->selectRaw('nombre AS label, id AS value')->get();
  return $subtipos;
})->name('getSubtipos');

/* Proveedores */
Route::resource('/proveedores', 'ProveedoreController');
/* Materia Prima */
Route::resource('/productos', 'ProductoController');
/* Ordenes de compras */
Route::resource('/ordendecompras', 'OrdendecompraController');
Route::get('/odcAprobar/{id}', 'UtilController@ordenCompraAprobar')->name('odc.aprobar');
Route::get('/ordendecompras/odcdetalles/create', 'OrdendecompradetalleController@create')->name('odcdetalles.create');
/* Compras */
Route::resource('/compras', 'CompraController');
Route::get('/loadOrden/{orden}', 'UtilController@loadOrdenes');
Route::get('/toInventario/{compra}', 'UtilController@toInventario')->name('toInventario');

/* Inventarios */
Route::resource('/inventarios', 'InventarioController');


/* Route for Vue */
Route::get('/getPro', function() {
  return \DB::table('productos')->selectRaw('nombre AS label, id AS value')->get();
});
Route::get('/proveedoresList', function() {
  return \DB::table('proveedores')->selectRaw('nombre AS label, id AS value')->get();
});
Route::get('/getODCD/{id}', 'UtilController@ordenDetalles')->name('getODCD');

/* Util Controller */
Route::get('/getTipos','UtilController@getTipos');
Route::get('/getTipCodigo/{tipo}', 'UtilController@getTipCodigo');
Route::get('/getSTipCodigo/{tipo}', 'UtilController@getSTipCodigo');
Route::get('/getPropiedades/{producto}', 'UtilController@getPropiedades');