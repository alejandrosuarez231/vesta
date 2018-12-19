<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compradetalle extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'compradetalles';
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['compra_id','producto_id','cantidad','precio'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Compradetalle belongs to Compra.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function compra()
  {
    // belongsTo(RelatedModel, foreignKey = compra_id, keyOnRelatedModel = id)
    return $this->belongsTo(Compra::class);
  }
}
