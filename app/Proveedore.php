<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedore extends Model
{
  use Notifiable;
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'proveedores';
  protected $fillable = ['fiscalid','nombre','direccion','telefonos','email','website','credito'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Proveedore has many Mtp.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function mtp()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = proveedore_id, localKey = id)
    return $this->hasMany(Mtp::class);
  }

  /**
   * Proveedore has many Ordendecompra.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function ordendecompra()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = proveedore_id, localKey = id)
    return $this->hasMany(Ordendecompra::class,'proveedor_id');
  }

}
