<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista_materiale extends Model
{
  /**
  * The database table used by the model.
  *
  * @var string
  */
  protected $table = 'lista_materiales';
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['sku', 'producto_id', 'material_id', 'descripcion_id', 'largo', 'ancho', 'espesor', 'largo_izq', 'largo_der', 'ancho_sup', 'ancho_inf', 'mec1', 'mec2', 'cantidad'];

  /**
   * Lista_materiale belongs to Producto.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function producto()
  {
    // belongsTo(RelatedModel, foreignKey = producto_id, keyOnRelatedModel = id)
    return $this->belongsTo(Producto::class);
  }
  /**
   * Lista_materiale belongs to Material.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function material()
  {
    // belongsTo(RelatedModel, foreignKey = material_id, keyOnRelatedModel = id)
    return $this->belongsTo(Materiale::class,'material_id');
  }
  /**
   * Lista_materiale belongs to Propiedade.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function propiedad()
  {
    // belongsTo(RelatedModel, foreignKey = propiedade_id, keyOnRelatedModel = id)
    return $this->belongsTo(Propiedade::class,'propiedad_id');
  }
  /**
   * Lista_materiale belongs to Descripcion.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function descripcion()
  {
    // belongsTo(RelatedModel, foreignKey = descripcion_id, keyOnRelatedModel = id)
    return $this->belongsTo(Descripcione::class,'descripcion_id');
  }
}
