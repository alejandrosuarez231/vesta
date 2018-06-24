<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidad extends Model
{
  use Notifiable;
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'unidades';
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['nombre','acronimo'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Proveedore has many Mtp.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function producto()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = proveedore_id, localKey = id)
    return $this->hasMany(Producto::class);
  }

}
