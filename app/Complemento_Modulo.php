<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complemento_Modulo extends Model
{
	use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'complemento_modulos';
	/**
	 * Fields that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['tipo_id','subtipo_id','nombre','costo'];

	/**
	 * Complemento_Modulo belongs to Tipo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function tipo()
	{
		// belongsTo(RelatedModel, foreignKey = tipo_id, keyOnRelatedModel = id)
		return $this->belongsTo(Tipo::class);
	}
	/**
	 * Complemento_Modulo belongs to Subtipo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function subtipo()
	{
		// belongsTo(RelatedModel, foreignKey = subtipo_id, keyOnRelatedModel = id)
		return $this->belongsTo(Subtipo::class);
	}
}
