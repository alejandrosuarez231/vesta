<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modulos';
    protected $guarded = ['id'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['sku_grupo','tipo_id','subtipo_id','categoria_id' ,'nombre','consecutivo'];

    /**
     * Modulo belongs to Tipos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo()
    {
        // belongsTo(RelatedModel, foreignKey = tipos_id, keyOnRelatedModel = id)
        return $this->belongsTo(Tipo::class);
    }

    /**
     * Modulo belongs to Subtipo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subtipo()
    {
        // belongsTo(RelatedModel, foreignKey = subtipo_id, keyOnRelatedModel = id)
        return $this->belongsTo(Subtipo::class);
    }

    /**
     * Modulo belongs to Categoria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        // belongsTo(RelatedModel, foreignKey = categoria_id, keyOnRelatedModel = id)
        return $this->belongsTo(Categoria::class);
    }
  }
