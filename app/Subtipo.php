<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subtipo extends Model
{
  use Notifiable;
  use SoftDeletes;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'subtipos';

  protected $fillable = ['tipo_id','nombre','acronimo'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Subcategoria belongs to Categoria.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function tipo()
  {
    // belongsTo(RelatedModel, foreignKey = categoria_id, keyOnRelatedModel = id)
    return $this->belongsTo(Tipo::class);
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

  /**
   * Subtipo has many Codigo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function codigo()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = subtipo_id, localKey = id)
    return $this->hasMany(Codigo::class);
  }

  /**
   * Subtipo has many Proyecto.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function proyecto()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = subtipo_id, localKey = id)
    return $this->hasMany(Proyecto::class);
  }

  /**
   * Subtipo has many Propsextra.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function propsextra()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = subtipo_id, localKey = id)
    return $this->hasMany(Propsextra::class);
  }

  /**
   * Subtipo has many Mtp.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function mtp()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = subtipo_id, localKey = id)
    return $this->hasMany(Mtp::class,'mtp_subtipo_id');
  }

}
