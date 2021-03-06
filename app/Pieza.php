<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pieza extends Model
{
	use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'piezas';
	protected $guarded = ['id'];
	protected $dates = ['created_at','updated_at','deleted_at','approved_on'];
	/**
	 * Fields that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['modulo_id','producto','pieza_modulo_id','materiale_id','descripcion','cantidad','largo','largo_sup','largo_inf','ancho','ancho_izq','ancho_der','mecanizado1','mecanizado2','created_by','updated_by','approved_by','approved_on'];

	/**
	 * Query scope .
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeDone($query,$flag)
	{
		return $query->where('approved_by',$flag);
	}

	/**
	 * Pieza belongs to Modelo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function modulo()
	{
		// belongsTo(RelatedModel, foreignKey = modulo_id, keyOnRelatedModel = id)
		return $this->belongsTo(Modulo::class);
	}
	/**
	 * Pieza belongs to Pieza_modulo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function pieza_modulo()
	{
		// belongsTo(RelatedModel, foreignKey = pieza_modulo_id, keyOnRelatedModel = id)
		return $this->belongsTo(Pieza_modulo::class,'piezas_modulo_id');
	}
	/**
	 * Pieza belongs to Materiale.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function materiale()
	{
		// belongsTo(RelatedModel, foreignKey = materiale_id, keyOnRelatedModel = id)
		return $this->belongsTo(Materiale::class);
	}
	/**
	 * Pieza belongs to Creado.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function creado()
	{
		// belongsTo(RelatedModel, foreignKey = creado_id, keyOnRelatedModel = id)
		return $this->belongsTo(User::class,'created_by');
	}
	/**
	 * Pieza belongs to Aprobado.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function aprobado()
	{
		// belongsTo(RelatedModel, foreignKey = aprobado_id, keyOnRelatedModel = id)
		return $this->belongsTo(User::class,'approved_by');
	}

	/**
	 * Pieza belongs to Skulistado.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function skulistado()
	{
		// belongsTo(RelatedModel, foreignKey = skulistado_id, keyOnRelatedModel = id)
		return $this->belongsTo(Skulistado::class);
	}

	/**
	 * Pieza has one Test.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function test()
	{
		// hasOne(RelatedModel, foreignKeyOnRelatedModel = pieza_id, localKey = id)
		return $this->hasOne(Skulistado::class,'modulo_id','modulo_id');
	}
}
