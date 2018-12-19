<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pieza_sku extends Model
{
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'pieza_skus';
  protected $guarded = ['id'];
  protected $dates = ['approved_on','created_at','updated_at','deleted_at'];
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['modulo_id', 'skulistado_id', 'piezas_modulo_id', 'materiale_id', 'descripcion', 'cantidad', 'largo', 'largo_sup', 'largo_inf', 'ancho', 'ancho_izq', 'ancho_der', 'mecanizado1', 'mecanizado2', 'created_by', 'updated_by', 'approved_by', 'approved_on'];

  /**
   * Pieza_sku belongs to Modulo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function modulo()
  {
    // belongsTo(RelatedModel, foreignKey = modulo_id, keyOnRelatedModel = id)
    return $this->belongsTo(Modulo::class);
  }
  /**
   * Pieza_sku belongs to Skulistado.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function skulistado()
  {
    // belongsTo(RelatedModel, foreignKey = skulistado_id, keyOnRelatedModel = id)
    return $this->belongsTo(Skulistado::class);
  }

  /**
   * Pieza_sku belongs to Pieza.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function pieza()
  {
    // belongsTo(RelatedModel, foreignKey = pieza_id, keyOnRelatedModel = id)
    return $this->belongsTo(Pieza_modulo::class,'piezas_modulo_id');
  }

  /**
   * Pieza_sku belongs to Materiale.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function materiale()
  {
    // belongsTo(RelatedModel, foreignKey = materiale_id, keyOnRelatedModel = id)
    return $this->belongsTo(Materiale::class);
  }

  /**
   * Componente_sku belongs to Creado.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function creado()
  {
    // belongsTo(RelatedModel, foreignKey = creado_id, keyOnRelatedModel = id)
    return $this->belongsTo(User::class,'created_by');
  }

  /**
   * Componente_sku belongs to Aprobado.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function aprobado()
  {
    // belongsTo(RelatedModel, foreignKey = aprobado_id, keyOnRelatedModel = id)
    return $this->belongsTo(User::class,'approved_by');
  }

}
