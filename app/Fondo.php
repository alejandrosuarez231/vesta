<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fondo extends Model
{
  use SoftDeletes;

  protected $table = 'fondos';
  protected $fillable = ['valor','acronimo'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  /**
   * Fondo has many Modulo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function modulo()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = fondo_id, localKey = id)
    return $this->hasMany(Modulo::class,'fondos','id');
  }
}
