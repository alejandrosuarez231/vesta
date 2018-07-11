<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
  use Notifiable;
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'tipos';
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = [
    'tipologia',
    'acomtip',
    'nombre',
    'acronimo'
  ];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Categoria has many Subcate.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function subtipo()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = categoria_id, localKey = id)
    return $this->hasMany(Subtipo::class);
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
   * Tipo has many Tipo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function proyecto()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = tipo_id, localKey = id)
    return $this->hasMany(Proyecto::class);
  }
}
