<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Extra extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'extras';

    /**
     * [$fillable description]
     * @var [type]
     */
    protected $fillable = ['propiedad'];
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
     * Extra has many Propsextra.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propsextra()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = extra_id, localKey = id)
        return $this->hasMany(Propsextra::class);
    }

    /**
     * Extra has many Producto.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function producto()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = extra_id, localKey = id)
        return $this->hasMany(Producto::class);
    }
}
