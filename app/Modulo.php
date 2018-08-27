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
    protected $fillable = ['tipos','subtipos','sar' ,'nombre','numerologia'];

    /**
     * Modulo belongs to Sar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sars()
    {
        // belongsTo(RelatedModel, foreignKey = sar_id, keyOnRelatedModel = id)
        return $this->belongsTo(Confpart::class,'sar','id');
    }

    /**
     * Modulo belongs to Tipos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipos()
    {
        // belongsTo(RelatedModel, foreignKey = tipos_id, keyOnRelatedModel = id)
        return $this->belongsTo(Tipo::class,'tipos');
    }
  }
