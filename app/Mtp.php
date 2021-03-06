<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mtp extends Model
{
  use SoftDeletes;
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

  /**
   * Mtp belongs to Tipo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function tipo()
  {
    // belongsTo(RelatedModel, foreignKey = tipo_id, keyOnRelatedModel = id)
    return $this->belongsTo(Tipo::class,'mtp_tipo_id');
  }

  /**
   * Mtp belongs to Subtipo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function subtipo()
  {
    // belongsTo(RelatedModel, foreignKey = subtipo_id, keyOnRelatedModel = id)
    return $this->belongsTo(Subtipo::class,'mtp_subtipo_id');
  }
}
