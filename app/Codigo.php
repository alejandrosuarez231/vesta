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
  protected $fillable = ['tipo','categoria_id','subcategoria_id','acronimo','tipologia'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Codigo belongs to Categoria.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categoria()
  {
    // belongsTo(RelatedModel, foreignKey = categoria_id, keyOnRelatedModel = id)
    return $this->belongsTo(Categoria::class);
  }

  /**
   * Codigo belongs to Subcategoria.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function subcategoria()
  {
    // belongsTo(RelatedModel, foreignKey = subcategoria_id, keyOnRelatedModel = id)
    return $this->belongsTo(Subcategoria::class);
  }
}
