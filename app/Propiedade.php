<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propiedade extends Model
{
  use Notifiable;
  use SoftDeletes;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'propiedades';

  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['producto_id','largo','largo_izq','largo_der','ancho','ancho_sup','ancho_inf','area','espesor','mec1','mec2'];
  protected $guarded = ['id'];
  protected $dates = ['created_at','updated_at','deleted_at'];
}
