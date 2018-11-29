<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Auth;

class Modulo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modulos';
    protected $guarded = ['id'];
    protected $dates = ['created_at','updated_at','deleted_at','approved_on'];

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['sku_grupo','tipo_id','subtipo_id','categoria_id' ,'nombre','consecutivo','descripcion','variantes','saps','fondos','espesor_permitido','ancho_minimo','ancho_maximo','ancho_var','alto_minimo','alto_maximo','alto_var','profundidad_minima','profundidad_maxima','profundidad_var','created_by','updated_by','approved_by','approved_on'];

    /* Scope Aprovados */
    public function scopeAprobados($query)
    {
        return $query->where('approved_by',true);
    }


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
    /**
     * Modulo belongs to Sap.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sap()
    {
        // belongsTo(RelatedModel, foreignKey = sap_id, keyOnRelatedModel = id)
        return $this->belongsTo(Sap::class,'saps','id');
    }

    /**
     * Modulo belongs to Fondo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fondo()
    {
        // belongsTo(RelatedModel, foreignKey = fondo_id, keyOnRelatedModel = id)
        return $this->belongsTo(Fondo::class);
    }
    /**
     * Modulo has many Pieza.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pieza()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = modulo_id, localKey = id)
        return $this->hasMany(Pieza::class);
    }
    /**
     * Modulo has many Complemento.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function complemento()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = modulo_id, localKey = id)
        return $this->hasMany(Complemento::class);
    }
    /**
     * Modulo belongs to Creado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creado()
    {
        // belongsTo(RelatedModel, foreignKey = creado_id, keyOnRelatedModel = id)
        return $this->belongsTo(User::class,'created_by');
    }
    /**
     * Modulo belongs to Aprobado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aprobado()
    {
        // belongsTo(RelatedModel, foreignKey = aprobado_id, keyOnRelatedModel = id)
        return $this->belongsTo(User::class,'approved_by');
    }
}
