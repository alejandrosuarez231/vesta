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
    'padre',
    'acromtip',
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

  /**
   * Tipo has many Codigo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function codigo()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = tipo_id, localKey = id)
    return $this->hasMany(Codigo::class);
  }

  /**
   * Tipo has many Propsextra.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function propsextra()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = tipo_id, localKey = id)
    return $this->hasMany(Propsextra::class);
  }

  /**
   * Tipo has many Mtp.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function mtp()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = tipo_id, localKey = id)
    return $this->hasMany(Mtp::class,'mtp_tipo_id');
  }

  /**
   * Tipo has many Modulos.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function modulos()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = tipo_id, localKey = id)
    return $this->hasMany(Modulo::class,'tipos');
  }

}
