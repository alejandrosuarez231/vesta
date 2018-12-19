<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sap extends Model
{
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'saps';
  protected $fillable = ['valor','acronimo'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  /**
   * Sap has many Modulo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function modulo()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = sap_id, localKey = id)
    return $this->hasMany(Modulo::class,'saps','id');
  }
}
