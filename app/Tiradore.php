<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tiradore extends Model
{
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'tiradores';
  protected $fillable = ['tipo','acronimo','precio'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
}
