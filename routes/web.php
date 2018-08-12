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
Route::get('dashboard', function () {
  return view('dashboard');
});

Route::get('/zohoClientIndex', 'ZohoController@clientIndex')->name('zoho.clientindex');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* Users */
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('indexData', 'UserController@indexData')->name('users.data');

Route::group(['middleware' => 'auth'], function() {
  /* Backend */
  Route::get('/dataTipos', 'TipoController@indexData')->name('data.tipos');
  Route::get('/Tipos', 'TipoController@tipos');
  Route::get('/TiposMTP', 'TipoController@tiposMTP');
  Route::get('/TiposPTO', 'TipoController@tiposPTO');
  Route::resource('/backend/tipos','TipoController');
  Route::get('/subtiposFiltro/{tipos}', 'SubtipoController@subtiposFiltro');
  Route::get('/dataSubtipos', 'SubtipoController@indexData')->name('data.subtipos');
  Route::resource('/backend/subtipos','SubtipoController');
  Route::get('/dataUnidades', 'UnidadController@indexData')->name('data.unidades');
  Route::resource('/backend/unidades', 'UnidadController');
  Route::get('/dataMarcas', 'MarcaController@indexData')->name('data.marcas');
  Route::resource('/backend/marcas', 'MarcaController');
  Route::get('/dataColores', 'ColoreController@indexData')->name('data.colores');
  Route::resource('/backend/colores','ColoreController');
  Route::get('/dataMateriales', 'MaterialeController@indexData')->name('data.materiales');
  Route::get('/MaterialEditData/{id}', 'MaterialeController@editData');
  Route::get('/setMaterial/{tipo}/{subtipo}', 'MaterialeController@setMaterial');
  Route::resource('/backend/materiales','MaterialeController');
  Route::get('/dataDescripciones', 'DescripcioneController@indexData')->name('data.descripciones');
  Route::get('/descripcionMaterial/{material}', 'DescripcioneController@descripcionMaterial');
  Route::resource('/backend/materiales/descripciones', 'DescripcioneController');
});

Route::group(['middleware' => 'auth'], function() {
  /* Frontend */
  Route::get('/frontend/constructor/construir','ConstructorController@construir')->name('constructor.construir');
  Route::post('/frontend/constructor','ConstructorController@ensamble')->name('constructor.ensamble');
  Route::get('/frontend/constructor/{id}/edit','ConstructorController@edit')->name('constructor.edit');
  Route::patch('/frontend/constructor/{id}','ConstructorController@update')->name('constructor.update');
  Route::get('/productoslist', 'ProductoController@indexData')->name('productos.data');
  Route::resource('/frontend/productos', 'ProductoController');
  Route::resource('/frontend/proyectos', 'ProyectoController');
  Route::resource('/frontend/inventarios', 'InventarioController');
});



Route::resource('/backend/codigos', 'CodigoController');
/* Truncate Codigos */
Route::get('/truncateCodigos', function(){
  \DB::table('codigos')->truncate();
  \Artisan::call('db:seed', array('--class' => 'CodigosSeeder'));
  return redirect('/backend/codigos');
});

Route::resource('/backend/proveedores', 'ProveedoreController');


Route::get('/backend/extras/asignar/{id}', 'PropsextraController@create')->name('extras.asignar');
Route::get('/backend/extras/extras/{id}', 'PropsextraController@index')->name('extras.extras');
Route::post('/setextras', 'PropsextraController@store')->name('extras.setting');
Route::resource('/backend/extras', 'ExtraController');




Route::resource('/cotizaciones','CotizacioneController');


/* VUE ROUTE's */
Route::get('/subtipos/{tipo}', 'SubtipoController@subtipos' );

/* Obtener datos del producto */
Route::get('/ProductoData/{id}', function($id) {
  return \App\Producto::findOrFail($id);
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


Route::get('/materiales', function() {
  /* Revisar */
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
/* set propiedades extras */
Route::get('/propsextra/{tipo}/{subtipo}', function($tipo, $subtipo) {
  return \App\Propsextra::with('extra:id,propiedad')->where('tipo_id',$tipo)->where('subtipo_id',$subtipo)->get();
});

/* Edit constructor */
Route::get('/getMtps/{producto}', function($producto) {
  $mtps = \App\Mtp::where('producto_id','=',$producto)->select('id','mtp_tipo_id','mtp_subtipo_id','cantidad')->get();
  $listMtps = collect();
  foreach ($mtps as $key => $value) {
    $listMtps->push(['tipo' => $value->mtp_tipo_id, 'subtipo' => $value->mtp_subtipo_id, 'cantidad' => $value->cantidad]);
  }
  return $listMtps;
});
Route::get('/getMateriales/{producto}', function($producto) {
  $materiales = \App\Lista_materiale::where('producto_id',$producto)
  ->select('material_id','descripcion_id','largo','ancho','espesor','largo_izq','largo_der','ancho_sup','ancho_inf','mec1','mec2','cantidad')
  ->get();
  $listMateriales = collect();
  foreach ($materiales as $key => $value) {
    $listMateriales->push([
      'material_id' => $value->material->id,
      'descripcion_id' => $value->descripcion_id,
      'largo' => $value->largo,
      'ancho' => $value->ancho,
      'espesor' => $value->espesor,
      'largo_izq' => $value->largo_izq,
      'largo_der' => $value->largo_der,
      'ancho_sup' => $value->ancho_sup,
      'ancho_inf' => $value->ancho_inf,
      'mec1' => $value->mec1,
      'mec2' => $value->mec2,
      'cantidad' => $value->cantidad
    ]);
  }
  return $listMateriales;
});