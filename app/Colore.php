<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colore extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'colores';
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['nombre'];
  /**
   * Colore has many Producto.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function producto()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = colore_id, localKey = id)
    return $this->hasMany(Producto::class);
  }

  /**
   * Colore has many Proyecto.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function proyecto()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = colore_id, localKey = id)
    return $this->hasMany(Proyecto::class);
  }
}
