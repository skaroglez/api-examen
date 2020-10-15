<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Model;

class ProductDocument extends Model
{
    protected $table = 'imagenes_productos';
    protected $fillable = [
        'id',
        'nombre',
        'ruta',
        'producto_id',
        'extension'
    ];

    public $timestamps = false;

    public function scopeWhereIdProduct( $query, $idProduct ) {
        return $query->where( "$this->table.producto_id", $idProduct );
    }

    public function scopeWhereIdImage( $query, $ididImage ) {
        return $query->where( "$this->table.id", $ididImage );
    }
}