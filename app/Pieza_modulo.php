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
  protected $dates = ['approved_on','created_at','updated_at','deleted_at'];
  protected $fillable = [
    'tipo_pieza',
    'materiale_id',
    'acronimo',
    'formula_largo',
    'formula_ancho',
    'formula_canto',
    'canto_largo1',
    'canto_largo2',
    'canto_ancho1',
    'canto_ancho2',
    'created_by',
    'updated_by',
    'approved_by',
    'approved_on'
  ];

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
  /**
   * Pieza_modulo belongs to User.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function creado()
  {
    // belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
    return $this->belongsTo(User::class,'created_by');
  }
  /**
   * Pieza_modulo belongs to Aprobado.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function aprobado()
  {
    // belongsTo(RelatedModel, foreignKey = aprobado_id, keyOnRelatedModel = id)
    return $this->belongsTo(User::class,'approved_by');
  }
}
