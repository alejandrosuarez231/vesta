<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descripcione extends Model
{
  /**
  * The database table used by the model.
  *
  * @var string
  */
  protected $table = 'descripciones';
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['descripcion'];

  /**
   * Descripcione has many Lista.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function lista_materiales()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = descripcione_id, localKey = id)
    return $this->hasMany(Lista_materiale::class,'descripcion_id');
  }

}
