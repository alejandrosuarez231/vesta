<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
  use Notifiable;
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'categorias';
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = [
    'tipo',
    'nombre',
    'descripcion'
  ];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Categoria has many Subcate.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function subcategoria()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = categoria_id, localKey = id)
    return $this->hasMany(Subcategoria::class);
  }

  /**
   * Categoria has many Codigo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function codigo()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = categoria_id, localKey = id)
    return $this->hasMany(Codigo::class);
  }

  /**
   * Categoria has many Mtp.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function producto()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = categoria_id, localKey = id)
    return $this->hasMany(Producto::class);
  }
}
