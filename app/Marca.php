<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
  use Notifiable;
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'marcas';
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['nombre','importada'];

  /**
   * Marca has many Producto.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function producto()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = marca_id, localKey = id)
    return $this->hasMany(Producto::class);
  }

  /**
   * Marca has many Proyecto.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function proyecto()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = marca_id, localKey = id)
    return $this->hasMany(Proyecto::class);
  }
}
