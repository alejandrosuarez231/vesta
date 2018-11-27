<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pieza_modulo extends Model
{
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'piezas_modulos';
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
  protected $fillable = ['tipo_pieza','materiale_id','acronimo','formula_area','formula_canto','canto_largo1','canto_largo2','canto_ancho1','canto_ancho2'];

  /**
   * Lista_materiales_modulo belongs to Materiale.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function materiale()
  {
    // belongsTo(RelatedModel, foreignKey = materiale_id, keyOnRelatedModel = id)
    return $this->belongsTo(Materiale::class);
  }
}
