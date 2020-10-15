<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Model;

class CategoryDocument extends Model
{
    protected $table = 'imagenes_categorias';
    protected $fillable = [
        'id',
        'nombre',
        'ruta',
        'categoria_id',
        'extension'
    ];

    public $timestamps = false;


    public function scopeWhereIdCategory( $query, $idCategory ) {
        return $query->where( "$this->table.categoria_id", $idCategory );
    }
}