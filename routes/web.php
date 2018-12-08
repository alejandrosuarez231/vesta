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

Route::get('/zohoClientes', 'ZohoController@clientIndex')->name('zoho.clientindex');
Route::get('/zohoProductos', 'ZohoController@productsIndex')->name('zoho.productsIndex');

Route::get('/zohoinventario', 'Zohoinventario@inventarioTotal')->name('zoho.inventario');
Route::get('/zohoinventariogroupsall', 'Zohoinventario@itemsGroupAll')->name('zoho.inventariogroupsall');
Route::get('/inventario/{groupid}', 'Zohoinventario@itemsGroup')->name('inventario.show');
Route::get('/inventario', 'Zohoinventario@itemsGroupAll')->name('inventario.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* Users */
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('indexData', 'UserController@indexData')->name('users.data');

/* Backend */
Route::get('/dataTipos', 'TipoController@indexData')->name('data.tipos');
Route::get('/Tipos', 'TipoController@tipos');
Route::get('/TiposMTP', 'TipoController@tiposMTP');
Route::get('/TiposPTO', 'TipoController@tiposPTO');
Route::resource('/backend/tipos','TipoController');
Route::get('/subtiposFiltro/{tipos}', 'SubtipoController@subtiposFiltro');
Route::get('/dataSubtipos', 'SubtipoController@indexData')->name('data.subtipos');
Route::get('/subtiposAll', 'SubtipoController@subtiposAll')->name('data.subtiposAll');
Route::get('/subtipos/{tipo}', 'SubtipoController@subtipos' );
Route::resource('/backend/subtipos','SubtipoController');

/*Categorias*/
Route::get('/datacategorias', 'CategoriasController@indexData')->name('data.categorias');
Route::get('/categoriasFiltro/{id}', 'CategoriasController@categoriasFiltro')->name('data.categoriasfiltro');
Route::get('/categoriainSkulistado', 'CategoriasController@searchCategoriaSkulistados');
Route::resource('/backend/categorias', 'CategoriasController');

Route::get('/dataUnidades', 'UnidadController@indexData')->name('data.unidades');
Route::resource('/backend/unidades', 'UnidadController');

Route::get('/dataMarcas', 'MarcaController@indexData')->name('data.marcas');
Route::resource('/backend/marcas', 'MarcaController');

Route::get('/dataColores', 'ColoreController@indexData')->name('data.colores');
Route::resource('/backend/colores','ColoreController');

Route::get('/dataMateriales', 'MaterialeController@indexData')->name('data.materiales');
Route::get('/MaterialEditData/{id}', 'MaterialeController@editData')->name('data.materialesedit');
Route::get('/setMaterial/{tipo}/{subtipo}', 'MaterialeController@setMaterial');
Route::resource('/backend/materiales','MaterialeController');

Route::get('/dataDescripciones', 'DescripcioneController@indexData')->name('data.descripciones');
// Route::get('/gavetasTipo', 'DescripcioneController@gavetasTipo')->name('data.gavetasTipo');
Route::get('/descripcionMaterial/{material}', 'DescripcioneController@descripcionMaterial');
Route::resource('/backend/materiales/descripciones', 'DescripcioneController');

Route::get('/dataConfparts', 'ConfpartController@dataIndex')->name('data.confparts');
Route::get('/menuConfparts/{ids}', 'ConfpartController@menusar')->name('data.menuConfparts');
Route::resource('/backend/confparts', 'ConfpartController');

Route::get('/dataConfmats', 'ConfmatController@dataIndex')->name('data.confmats');
Route::get('/materialCotiza/{material}', 'ConfmatController@cotizar')->name('data.materialCotiza');
Route::resource('/backend/confmats', 'ConfmatController');

/* Modulos */
Route::get('/dataModulos', 'ModuloController@indexData')->name('data.modulos');
Route::get('/aprobarModulo/{id}', 'ModuloController@aprobar')->name('modulos.aprobar');
Route::get('/modulosConstructor/{tipos}/{subtipos}/{sar}', 'ModuloController@modulosContructor')->name('data.moduloconstructor');
Route::get('/ModuloEditData/{id}', 'ModuloController@editData')->name('data.modulosedit');
Route::get('/getModulos/{tipo}/{sutipo}/{sap}/{sar}', 'ModuloController@getModulos')->name('data.getmodulos');

/* Modulo-Piezas */
Route::get('/dataModulosPiezas', 'PiezasModuloController@indexData')->name('data.modulospiezas');
Route::get('/getPiezaModulo/{pieza}', 'PiezasModuloController@getPiezaModulo')->name('data.modulopieza');
Route::resource('/backend/modulos/piezas', 'PiezasModuloController');

/* Definicion de piezas */
Route::get('backend/piezas/create/{id}','PiezaController@createBySku')->name('piezassku.piezas.create');
Route::get('/aprobarPiezas/{id}', 'PiezaController@aprobar')->name('piezassku.piezas.aprobar');
Route::get('/editPiezaData/{modulo_id}', 'PiezaController@editPiezaData')->name('piezassku.piezas.editdata');
Route::resource('backend/piezas', 'PiezaController',['as' => 'piezassku'])->except([
  'index','create','destroy'
]);

/* Piezas SKU Padres Piezas */
Route::get('/piezasSkuPadre/{skulistado_id}', 'PiezaSkuController@getPiezas');

/* Modulo-Complementos */
Route::get('/dataModulosComplementos', 'ComplementoModuloController@indexData')->name('data.moduloscomplementos');
Route::get('/aprobarComplementos/{id}', 'ComplementoController@aprobar')->name('complementosku.complementos.aprobar');
Route::get('/editComplementoData/{modulo_id}', 'ComplementoController@editComplementoData')->name('complementosku.complementos.editar');
Route::resource('/backend/modulos/complementos', 'ComplementoModuloController');

/* Definicion de complementos */
Route::get('backend/complementos/create/{id}','ComplementoController@createBySku')->name('complementosku.complementos.create');
Route::resource('backend/complementos', 'ComplementoController',['as' => 'complementosku'])->except([
  'index','create','destroy'
]);

Route::resource('/backend/modulos', 'ModuloController');


/* SKU Lista */
/* Creacion y Edicion de SKUs */
Route::get('/makeSKU/{tipo}/{subtipo}/{categoria}', 'SkuController@makeSku')->name('sku.make');
Route::get('/makeSkuPadre/{id}', 'SkuController@makeSkuPadre')->name('sku.makeskupadre');
Route::get('/makeSkuPadrelote', 'SkuController@makeSkuPadreLote')->name('sku.makeskupadrelote'); // Generar lote de SKU's
Route::get('/backend/skus/showList/{sku_grupo}', 'SkulistadoController@showList')->name('skus.showList');
Route::get('/searchSkuListado/{tipo}/{subtipo}/{categoria}/{sap}/{fondo}', 'SkulistadoController@searchSku');
Route::get('/dataskuslist', 'SkulistadoController@indexData')->name('data.skuslist');
Route::resource('/backend/skus', 'SkulistadoController');
/* Herrajes */
Route::resource('/backend/correderas', 'CorrederaController');
Route::resource('/backend/bisagras', 'BisagraController');
Route::resource('/backend/brapes', 'BrapeController');
Route::resource('/backend/tiradores', 'TiradoreController');

/* Sistemas de Aperturdas */
Route::get('/saplist', 'SapController@sapList')->name('data.saplist');
Route::get('/fondolist', 'FondoController@fondoList')->name('data.fondolist');

/* Frontend */
Route::get('/frontend/constructor/construir','ConstructorController@construir')->name('constructor.construir');
Route::post('/frontend/constructor','ConstructorController@ensamble')->name('constructor.ensamble');
/* Constructor edit */
Route::get('/frontend/constructor/{id}/edit','ConstructorController@edit')->name('constructor.edit');
Route::get('/ProyectoComplementos/{id}','ConstructorController@dataComplementos')->name('constructor.dataComplementos');
Route::get('/getMateriales/{producto}', 'ListaMaterialeController@getMateriales')->name('constructor.dataPiezas');
/* Constructor edit */
Route::patch('/frontend/constructor/{id}','ConstructorController@update')->name('constructor.update');
Route::get('/productoslist', 'ProductoController@indexData')->name('productos.data');

Route::get('/setCotizacion/{tipo}/{subtipo}', 'ProductoController@setCotizacion')->name('data.setCotizacion');
Route::get('/getMtpSKU/{id}', 'ProductoController@getSKU')->name('data.getMtpSKU');
Route::resource('/frontend/productos', 'ProductoController');

Route::get('/dataProyectos', 'ProyectoController@indexData')->name('data.proyectos');
Route::get('/dataGavetas', 'ProyectoController@gavetas')->name('data.gavetas');
Route::get('/dataBisagras', 'ProyectoController@bisagras')->name('data.bisagras');
Route::get('/dataTiradores', 'ProyectoController@tiradores')->name('data.tiradores');
Route::get('/dataMarcasHerrajes/{tipo}/{subtipo}/{extra}', 'ProyectoController@marcasHerrajes')->name('data.marcasHerrajes');
Route::get('/cotizaProyecto/{id}', 'ProyectoController@cotizar')->name('data.proyectocotiza');
Route::resource('/frontend/proyectos', 'ProyectoController');
Route::resource('/frontend/inventarios', 'InventarioController');
Route::resource('/backend/codigos', 'CodigoController');

/* Truncate Codigos */
Route::get('/truncateCodigos', function(){
  \DB::table('codigos')->truncate();
  \Artisan::call('db:seed', array('--class' => 'CodigosSeeder'));
  return redirect('/backend/codigos');
});

/* Vaciar Tablas */
Route::get('VACIAR-TABLAS', function() {
  \DB::table('codigos')->truncate();
  \DB::table('colores')->truncate();
  \DB::table('confparts')->truncate();
  \DB::table('descripciones')->truncate();
  \DB::table('extras')->truncate();
  \DB::table('lista_materiales')->truncate();
  \DB::table('marcas')->truncate();
  \DB::table('materiales')->truncate();
  \DB::table('modulos')->truncate();
  \DB::table('mtps')->truncate();
  \DB::table('productos')->truncate();
  \DB::table('propiedades')->truncate();
  \DB::table('propsextras')->truncate();
  \DB::table('propsforms')->truncate();
  \DB::table('proyectos')->truncate();
  \DB::table('tipos')->truncate();
  \DB::table('subtipos')->truncate();
  \DB::table('tipos')->truncate();
  \DB::table('unidades')->truncate();
  \DB::table('users')->truncate();
});

Route::resource('/backend/proveedores', 'ProveedoreController');


Route::get('/backend/extras/asignar/{id}', 'PropsextraController@create')->name('extras.asignar');
Route::get('/backend/extras/extras/{id}', 'PropsextraController@index')->name('extras.extras');
Route::post('/setextras', 'PropsextraController@store')->name('extras.setting');
Route::resource('/backend/extras', 'ExtraController');

/* Cotizaciones */
Route::get('/getMaterial/{id}', 'CotizacioneController@getMateriales')->name('cotiza.material');

Route::resource('/cotizaciones','CotizacioneController');

/* VUE ROUTE's */

Route::get('/editarMTPContructor/{id}', 'MtpController@editarMTPContructor');

/* Obtener datos del producto */
Route::get('/ProductoData/{id}', function($id) {
  return \App\Producto::findOrFail($id);
});

/* Subtipos para MTP Nuevos */
Route::get('/mtpsubtipos/{tipo}', 'SubtipoController@mtpsubtipos');
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

