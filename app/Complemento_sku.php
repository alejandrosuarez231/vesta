<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complemento_sku extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'complemento_skus';
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at','approved_on'];

  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['modulo_id', 'skulistado_id', 'descripcion', 'categoria_id', 'cantidad', 'created_by', 'updated_by', 'approved_by'];

  /**
   * Componente_sku belongs to Modulo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function modulo()
  {
    // belongsTo(RelatedModel, foreignKey = modulo_id, keyOnRelatedModel = id)
    return $this->belongsTo(Modulo::class);
  }

  /**
   * Componente_sku belongs to Skulistado.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function skulistado()
  {
    // belongsTo(RelatedModel, foreignKey = skulistado_id, keyOnRelatedModel = id)
    return $this->belongsTo(Skulistado::class);
  }

  /**
   * Componente_sku belongs to Categoria.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categoria()
  {
    // belongsTo(RelatedModel, foreignKey = categoria_id, keyOnRelatedModel = id)
    return $this->belongsTo(Categoria::class);
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
