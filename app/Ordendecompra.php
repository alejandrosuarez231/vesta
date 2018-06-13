<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordendecompra extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'ordendecompras';
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['codigo','fecha','proveedor_id','prioridad','aprobada','procesada'];
  protected $guarded =['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Ordendecompra belongs to Proveedor.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function proveedor()
  {
    // belongsTo(RelatedModel, foreignKey = proveedor_id, keyOnRelatedModel = id)
    return $this->belongsTo(Proveedore::class,'proveedor_id');
  }
  /**
   * Ordendecompra has many Ordendecompradetalle.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function ordendecompradetalle()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = ordendecompra_id, localKey = id)
    return $this->hasMany(Ordendecompradetalle::class);
  }

  /**
   * Ordendecompra has many Inventario.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function inventario()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = ordendecompra_id, localKey = id)
    return $this->hasMany(Inventario::class);
  }
}
