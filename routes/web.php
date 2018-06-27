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

/* Backend */
Route::resource('/backend/tipos','TipoController');
Route::resource('/backend/subtipos','SubtipoController');
Route::resource('/backend/unidades', 'UnidadController');
Route::resource('/backend/colores','ColoreController');
Route::resource('/backend/codigos', 'CodigoController');
Route::resource('/backend/marcas', 'MarcaController');
Route::resource('/backend/proveedores', 'ProveedoreController');
Route::resource('/backend/materiales','MaterialeController');

/* Frontend */
Route::get('/frontend/constructor/construir','ConstructorController@construir')->name('constructor.construir');
Route::post('/frontend/constructor','ConstructorController@ensamble')->name('constructor.ensamble');
Route::resource('/frontend/productos', 'ProductoController');
Route::resource('/frontend/inventarios', 'InventarioController');

/* VUE ROUTE's */
Route::get('/subtipos/{tipo}', function($tipo) {
  return \App\Subtipo::where('tipo_id','=',$tipo)->pluck('nombre','id');
});
Route::get('/mtps', function() {
 return \App\Producto::with('tipo:id,tipologia')->get()->where('tipo.tipologia','=','MTP')->pluck('nombre','id');
});
Route::get('/materiales', function() {
  return \App\Materiale::pluck('nombre','id');
});
Route::get('/descripciones', function() {
  return \App\Descripcione::pluck('descripcion','id');
});