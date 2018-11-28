<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'piezas';
	protected $guarded = ['id'];
	protected $dates = ['created_at','updated_at','deleted_at'];
	/**
	 * Fields that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['modulo_id','producto','pieza_modulo_id','materiale_id','descripcion','cantidad','largo','largo_sup','largo_inf','ancho','ancho_izq','ancho_der','mecanizado1','mecanizado2','created_by','updated_by'];

	/**
	 * Pieza belongs to Modelo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function modelo()
	{
		// belongsTo(RelatedModel, foreignKey = modelo_id, keyOnRelatedModel = id)
		return $this->belongsTo(Modelo::class);
	}
	/**
	 * Pieza belongs to Pieza_modulo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function pieza_modulo()
	{
		// belongsTo(RelatedModel, foreignKey = pieza_modulo_id, keyOnRelatedModel = id)
		return $this->belongsTo(Pieza_modulo::class);
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
}
