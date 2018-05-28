<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordendecompradetalle extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'ordendecompras_detalles';
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['ordendecompra_id','tipo','producto_id','cantidad'];
  protected $guarded = ['id'];
  protected $dates =['created_at','updated_at','deleted_at'];
  /**
   * Ordendecompradetalle belongs to Ordendecompra.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function ordendecompra()
  {
    // belongsTo(RelatedModel, foreignKey = ordendecompra_id, keyOnRelatedModel = id)
    return $this->belongsTo(Ordendecompra::class);
  }
  /**
   * Ordendecompradetalle belongs to Mtp.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function mtp()
  {
    // belongsTo(RelatedModel, foreignKey = mtp_id, keyOnRelatedModel = id)
    return $this->belongsTo(Mtp::class,'producto_id');
  }
}
