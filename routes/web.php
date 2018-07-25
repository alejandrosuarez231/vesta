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
/* Users */
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('indexData', 'UserController@indexData')->name('users.data');

/* Backend */
Route::resource('/backend/tipos','TipoController');
Route::resource('/backend/subtipos','SubtipoController');
Route::resource('/backend/unidades', 'UnidadController');
Route::resource('/backend/colores','ColoreController');
Route::resource('/backend/codigos', 'CodigoController');
/* Truncate Codigos */
Route::get('/truncateCodigos', function(){
  \DB::table('codigos')->truncate();
  \Artisan::call('db:seed', array('--class' => 'CodigosSeeder'));
  return redirect('/backend/codigos');
});
Route::resource('/backend/marcas', 'MarcaController');
Route::resource('/backend/proveedores', 'ProveedoreController');
Route::resource('/backend/materiales','MaterialeController');

/* Frontend */
Route::get('/frontend/constructor/construir','ConstructorController@construir')->name('constructor.construir');
Route::post('/frontend/constructor','ConstructorController@ensamble')->name('constructor.ensamble');
Route::resource('/frontend/productos', 'ProductoController');
Route::resource('/frontend/proyectos', 'ProyectoController');
Route::resource('/frontend/inventarios', 'InventarioController');

Route::resource('/cotizaciones','CotizacioneController');


/* VUE ROUTE's */
Route::get('/subtipos/{tipo}', function($tipo) {
  return \App\Subtipo::where('tipo_id','=',$tipo)->pluck('nombre','id');
});
/* Subtipos para MTP Nuevos */
Route::get('/mtpsubtipos/{tipo}', function($tipo) {
  return \App\Subtipo::where('tipo_id','=',$tipo)->pluck('nombre','id');
});
/* Obtener Base SKU */
Route::get('/getBaseSku/{tipo}/{subtipo}', function($tipo, $subtipo) {
  return \App\Codigo::where('tipo_id',$tipo)->where('subtipo_id',$subtipo)->select('skubase','numeracion')->get();
});
Route::get('/getBaseSkuW/{base}', function($base) {
  return \App\Codigo::where('skubase','=',$base)->get();
});
Route::get('/getMarca/{id}', function($id) {
  return \App\Marca::find($id);
});
/* Chequear existencia del SKU para auto incrementar */
Route::get('/querySKU/{base}', function($base) {
  return \App\Producto::where('sku','LIKE',"{$base}%")->orderBy('id','desc')->get();
});

Route::get('/mtps', function() {
 return \App\Producto::with('tipo:id,tipologia')->get()->where('tipo.tipologia','=','MTP')->pluck('nombre','id');
});

Route::get('/setMaterial/{material}', function($material){
  /* Filtrar materiales */
  $descripciones = \App\Descripcione::where('materiale_id',$material)->select('id','descripcion','flargo','fancho','espesor')->get();
  foreach ($descripciones as $value) {
    $coleccion[$value->id] = collect(['descripcion' => $value->descripcion, 'largo' => $value->flargo, 'ancho' => $value->fancho, 'espesor' => $value->espesor ]);
  }
  return $coleccion;
} );

Route::get('/materiales', function() {
  $materiales = \App\Materiale::select('nombre','id')->get();
  $materialList = collect();
  foreach ($materiales as $key => $value) {
    $materialList->push(['label'=>$value->nombre, 'value'=>$value->id]);
  }
  return $materialList->toJson();
});
Route::get('/descripciones', function() {
  return \App\Descripcione::pluck('descripcion','id');
});