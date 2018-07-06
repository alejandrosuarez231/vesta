<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proyectos';
    protected $fillable = [
    'sku',
    'tipo_id',
    'subtipo_id',
    'nombre',
    'descripcion',
    'marca_id',
    'unidad_id',
    'color_id',
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
  public function tipo()
  {
    // belongsTo(RelatedModel, foreignKey = categoria_id, keyOnRelatedModel = id)
    return $this->belongsTo(Tipo::class);
  }
  /**
   * Mtp belongs to Subcategoria.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function subtipo()
  {
    // belongsTo(RelatedModel, foreignKey = subcategoria_id, keyOnRelatedModel = id)
    return $this->belongsTo(Subtipo::class);
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
   * Producto belongs to Marca.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function marca()
  {
    // belongsTo(RelatedModel, foreignKey = marca_id, keyOnRelatedModel = id)
    return $this->belongsTo(Marca::class);
  }

  /**
   * Producto belongs to Colore.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function colore()
  {
    // belongsTo(RelatedModel, foreignKey = colore_id, keyOnRelatedModel = id)
    return $this->belongsTo(Colore::class);
  }

  /**
   * Producto has many Mtp.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function mtp()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = producto_id, localKey = id)
    return $this->hasMany(Mtp::class,'mtp','id');
  }
  /**
   * Producto has many Lista.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function lista_materiales()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = producto_id, localKey = id)
    return $this->hasMany(Lista_materiale::class);
  }

}
