<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materiale extends Model
{
  use Notifiable;
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'materiales';
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['tipo_id','subtipo_id','sku','nombre'];

  /**
   * Materiale has many Lista.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function lista_materiales()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = materiale_id, localKey = id)
    return $this->hasMany(Lista_materiale::class,'material_id');
  }

  /**
   * Materiale has many Descripcione.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function descripcione()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = materiale_id, localKey = id)
    return $this->hasMany(Descripcione::class);
  }
}
