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
  protected $fillable = ['sku','materiale_id','descripcion','acronimo','formula_area','formula_canto','canto_largo1','canto_largo2','canto_ancho1','canto_ancho2','flargo','fancho','espesor'];

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

  /**
   * Descripcione belongs to Materiale.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function materiale()
  {
    // belongsTo(RelatedModel, foreignKey = materiale_id, keyOnRelatedModel = id)
    return $this->belongsTo(Materiale::class);
  }
}
