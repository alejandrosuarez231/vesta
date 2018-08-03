<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mtp extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'mtps';
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['producto_id','mtp_tipo_id','mtp_subtipo_id','cantidad'];

  /**
   * Mtp belongs to Producto.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function producto()
  {
    // belongsTo(RelatedModel, foreignKey = producto_id, keyOnRelatedModel = id)
    return $this->belongsTo(Producto::class,'mtp','id');
  }

  /**
   * Mtp has many Proyecto.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function proyecto()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = mtp_id, localKey = id)
    return $this->hasMany(Proyecto::class);
  }
}
