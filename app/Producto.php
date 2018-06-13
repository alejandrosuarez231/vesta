<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'productos';

  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = [
    'sku');
    'categoria_id',
    'subcategoria_id',
    'nombre',
    'descripcion',
    'marca_id',
    'unidad_id',
    'largo',
    'ancho',
    'area',
    'espesor',
    'propiedades',
    'importado',
    'min',
    'max'
  ];

  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Mtp belongs to Categoria.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categoria()
  {
    // belongsTo(RelatedModel, foreignKey = categoria_id, keyOnRelatedModel = id)
    return $this->belongsTo(Categoria::class);
  }
  /**
   * Mtp belongs to Subcategoria.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function subcategoria()
  {
    // belongsTo(RelatedModel, foreignKey = subcategoria_id, keyOnRelatedModel = id)
    return $this->belongsTo(Subcategoria::class);
  }
  /**
   * Mtp belongs to Unidad.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function unidad()
  {
    // belongsTo(RelatedModel, foreignKey = unidad_id, keyOnRelatedModel = id)
    return $this->belongsTo(Unidad::class);
  }
  /**
   * Mtp belongs to Proveedor.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function proveedor()
  {
    // belongsTo(RelatedModel, foreignKey = proveedor_id, keyOnRelatedModel = id)
    return $this->belongsTo(Proveedore::class,'proveedor_id');
  }
  /**
   * Mtp has many Ordendecompra.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function ordendecompra()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = mtp_id, localKey = id)
    return $this->hasMany(Ordendecompra::class,'producto_id');
  }

  /**
   * Producto has many Inventario.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function inventario()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = producto_id, localKey = id)
    return $this->hasMany(Inventario::class);
  }
}
