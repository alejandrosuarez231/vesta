<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
  use SoftDeletes;
  /**
  * The database table used by the model.
  *
  * @var string
  */
  protected $table = 'categorias';

  protected $fillable = ['subtipo_id','nombre','acronimo'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  /**
   * Categoria has many Modulo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function modulo()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = categoria_id, localKey = id)
    return $this->hasMany(Modulo::class);
  }
}
