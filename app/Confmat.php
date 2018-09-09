<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Confmat extends Model
{
  use SoftDeletes;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'confmats';
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['materiale_id', 'productos'];
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
   * Confmat belongs to Materiale.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function materiale()
  {
    // belongsTo(RelatedModel, foreignKey = materiale_id, keyOnRelatedModel = id)
    return $this->belongsTo(Materiale::class);
  }
}
