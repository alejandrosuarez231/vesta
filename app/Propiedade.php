<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propiedade extends Model
{
  use Notifiable;
  use SoftDeletes;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'propiedades';

  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = [
    'producto_id',
    'largo',
    'ancho',
    'espesor',
    'veta',
    'largo_izq',
    'largo_der',
    'ancho_sup',
    'ancho_inf',
    'mec1',
    'mec2'
  ];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  /**
   * Propiedade has many Lista.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function lista_materiales()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = propiedade_id, localKey = id)
    return $this->hasMany(Lista_materiale::class,'propiedad_id');
  }

  /**
   * Propiedade has many Producto.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function producto()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = propiedade_id, localKey = id)
    return $this->hasMany(Producto::class,'propiedad_id','producto_id');
  }
}
