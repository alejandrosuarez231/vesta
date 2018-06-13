<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'inventarios';
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['fi','compra_id','producto_id','cantidad','precio','fo'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Inventario belongs to Ordendecompra.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function ordendecompra()
  {
    // belongsTo(RelatedModel, foreignKey = ordendecompra_id, keyOnRelatedModel = id)
    return $this->belongsTo(Ordendecompra::class);
  }

  /**
   * Inventario belongs to Producto.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function producto()
  {
    // belongsTo(RelatedModel, foreignKey = producto_id, keyOnRelatedModel = id)
    return $this->belongsTo(Producto::class);
  }
}
