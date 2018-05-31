<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategoria extends Model
{
  use Notifiable;
  use SoftDeletes;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'subcategorias';

  protected $fillable = ['categoria_id','nombre','acronimo'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Subcategoria belongs to Categoria.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categoria()
  {
    // belongsTo(RelatedModel, foreignKey = categoria_id, keyOnRelatedModel = id)
    return $this->belongsTo(Categoria::class);
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
   * Subcategoria has many Codigo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function codigo()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = subcategoria_id, localKey = id)
    return $this->hasMany(Codigo::class);
  }

}
