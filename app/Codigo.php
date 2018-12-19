<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'codigos';
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['tipo_id','subtipo_id','skubase','numeracion'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Codigo belongs to Tipo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function tipo()
  {
    // belongsTo(RelatedModel, foreignKey = tipo_id, keyOnRelatedModel = id)
    return $this->belongsTo(Tipo::class);
  }

  /**
   * Codigo belongs to Subtipo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function subtipo()
  {
    // belongsTo(RelatedModel, foreignKey = subtipo_id, keyOnRelatedModel = id)
    return $this->belongsTo(Subtipo::class);
  }
}
