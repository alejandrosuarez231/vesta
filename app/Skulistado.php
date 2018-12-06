<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skulistado extends Model
{
	use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'skulistados';
	/**
	 * Fields that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['modulo_id','sku_grupo','sku_padre','tipo_id','subtipo_id','categoria_id','descripcion','sap_id','fondo_id','activo'];

	protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  /**
   * Skulistado belongs to Modulo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function modulo()
  {
  	// belongsTo(RelatedModel, foreignKey = modulo_id, keyOnRelatedModel = id)
  	return $this->belongsTo(Modulo::class);
  }
  /**
   * Skulistado belongs to Tipo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function tipo()
  {
  	// belongsTo(RelatedModel, foreignKey = tipo_id, keyOnRelatedModel = id)
  	return $this->belongsTo(Tipo::class);
  }
  /**
   * Skulistado belongs to Subtipo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function subtipo()
  {
  	// belongsTo(RelatedModel, foreignKey = subtipo_id, keyOnRelatedModel = id)
  	return $this->belongsTo(Subtipo::class);
  }
  /**
   * Skulistado belongs to Categoria.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categoria()
  {
  	// belongsTo(RelatedModel, foreignKey = categoria_id, keyOnRelatedModel = id)
  	return $this->belongsTo(Categoria::class);
  }
  /**
   * Skulistado belongs to Sap.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function sap()
  {
  	// belongsTo(RelatedModel, foreignKey = sap_id, keyOnRelatedModel = id)
  	return $this->belongsTo(Sap::class);
  }
  /**
   * Skulistado belongs to Fondo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function fondo()
  {
  	// belongsTo(RelatedModel, foreignKey = fondo_id, keyOnRelatedModel = id)
  	return $this->belongsTo(Fondo::class);
  }

  /**
   * Skulistado has many Piezas.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function piezas()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = skulistado_id, localKey = id)
    return $this->hasMany(Pieza_sku::class,'modulo_id','modulo_id')->with('pieza','materiale');
  }

  /**
   * Skulistado has many Complementos.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function complementos()
  {
    // hasMany(RelatedModel, foreignKeyOnRelatedModel = skulistado_id, localKey = id)
    return $this->hasMany(Complemento_sku::class,'modulo_id','modulo_id')->with('categoria');
  }
}
