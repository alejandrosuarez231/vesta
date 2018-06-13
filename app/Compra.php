<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'compras';
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['fecha','ordendecompra_id','proveedore_id','prioridad','procesada'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Compra belongs to Proveedore.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function proveedore()
  {
    // belongsTo(RelatedModel, foreignKey = proveedore_id, keyOnRelatedModel = id)
    return $this->belongsTo(Proveedore::class);
  }

  /**
   * Compra has many Compradetalle.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function compradetalle()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = compra_id, localKey = id)
    return $this->hasMany(Compradetalle::class);
  }
}
