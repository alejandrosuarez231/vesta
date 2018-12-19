<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propsextra extends Model
{
  use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'propsextras';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['tipo_id','subtipo_id','extra_id'];
    /**
     * [$guarded description]
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * [$dates description]
     * @var [type]
     */
    protected $dates = ['created_at','updated_at','deleted_at'];

    /**
     * Propsextra belongs to Tipo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo()
    {
        // belongsTo(RelatedModel, foreignKey = tipo_id, keyOnRelatedModel = id)
        return $this->belongsTo(Tipo::class);
    }

    /**
     * Propsextra belongs to Subtipo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subtipo()
    {
        // belongsTo(RelatedModel, foreignKey = subtipo_id, keyOnRelatedModel = id)
        return $this->belongsTo(Subtipo::class);
    }

    /**
     * Propsextra belongs to Extra.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function extra()
    {
        // belongsTo(RelatedModel, foreignKey = extra_id, keyOnRelatedModel = id)
        return $this->belongsTo(Extra::class);
    }
}
