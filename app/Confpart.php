<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Confpart extends Model
{
  use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'confparts';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['nombre','valor'];

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
     * Confpart has many Proyecto.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectosar()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = confpart_id, localKey = id)
        return $this->hasMany(Proyecto::class,'sar','id');
    }

    public function proyectosap()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = confpart_id, localKey = id)
        return $this->hasMany(Proyecto::class,'sap','id');
    }
}
