<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pieza_sku extends Model
{
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'pieza_skus';
  protected $guarded = ['id'];
  protected $dates = ['approved_on','created_at','updated_at','deleted_at'];
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = [
    'modulo_id',
    'skulistado_id',
    'piezas_modulo_id',
    'materiale_id',
    'descripcion',
    'cantidad',
    'largo',
    'largo_sup',
    'largo_inf',
    'ancho',
    'ancho_izq',
    'ancho_der',
    'mecanizado1',
    'mecanizado2',
    'created_by',
    'updated_by',
    'approved_by',
    'approved_on'
  ];

}
