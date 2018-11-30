<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complemento extends Model
{
  use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'complementos';
    protected $guarded = ['id'];
    protected $dates = ['created_at','updated_at','deleted_at','approved_on'];
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['modulo_id','producto','categoria_id','cantidad','created_by','updated_by','approved_by','approved_on'];

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
     * Complemento belongs to Modulo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modulo()
    {
      // belongsTo(RelatedModel, foreignKey = modulo_id, keyOnRelatedModel = id)
      return $this->belongsTo(Modulo::class);
    }
    /**
     * Complemento belongs to Categoria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
      // belongsTo(RelatedModel, foreignKey = categoria_id, keyOnRelatedModel = id)
      return $this->belongsTo(Categoria::class);
    }
    /**
     * Complemento belongs to Aprobado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aprobado()
    {
        // belongsTo(RelatedModel, foreignKey = aprobado_id, keyOnRelatedModel = id)
        return $this->belongsTo(User::class,'approved_by');
    }
  }
