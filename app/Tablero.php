<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tablero extends Model
{
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'tableros';
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['categoria_id','colore_id','4','15','18','19','25'];

  /**
   * Tablero belongs to Categoria.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categoria()
  {
    // belongsTo(RelatedModel, foreignKey = categoria_id, keyOnRelatedModel = id)
    return $this->belongsTo(Categoria::class);
  }

  /**
   * Tablero belongs to Colore.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function colore()
  {
    // belongsTo(RelatedModel, foreignKey = colore_id, keyOnRelatedModel = id)
    return $this->belongsTo(Colore::class);
  }
}
