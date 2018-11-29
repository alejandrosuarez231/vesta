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
	 * Pieza belongs to Aprobado.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function aprobado()
	{
		// belongsTo(RelatedModel, foreignKey = aprobado_id, keyOnRelatedModel = id)
		return $this->belongsTo(User::class,'approved_by');
	}
}
