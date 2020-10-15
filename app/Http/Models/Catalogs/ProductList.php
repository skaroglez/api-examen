<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    protected $table = 'listado_productos';
    protected $fillable = [ 'id',		
                            'descripcion',  
                            'categoria_id',           
                            'estatus_id',           
                            'fecha_registro',           
                            'usuario_registra_id'
                        ];
    public $timestamps = false;

    //JOIN
    public function scopeJoinStatus( $query ){
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', "$this->table.estatus_id");
    } 
    public function scopeJoinCategories( $query ){
        return $query->join("listado_categorias", 'listado_categorias.id', '=', "$this->table.categoria_id");
    }  
    
    //WHERE
    public function scopeWhereIdProduct( $query, $idProduct ) {
        return $query->where( "$this->table.id", $idProduct );  
    }
    public function scopeWhereIsDifferentIdProduct( $query, $idProduct ) {
        return $query->where( "$this->table.id", "!=", $idProduct );  
    }
    public function scopeWhereDesProduct( $query, $desProduct ) {
        return $query->where( "$this->table.descripcion", 'like' , "%$desProduct%" );  
    }
    public function scopeWhereDesProductExact( $query, $desProduct ) {
        return $query->where( "$this->table.descripcion", $desProduct );  
    }
    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( "$this->table.estatus_id", '=' ,$idStatus );
    }
    public function scopeWhereIdCategory( $query, $idCategory) {
        return $query->where( "$this->table.categoria_id", '=' ,$idCategory );
    }
    public function scopeWhereDesCategory( $query, $desCategory) {
        return $query->where( "listado_categorias.descripcion", 'like' , "%$desCategory%" );  
    }

    //ORDER BY
    public function scopeOrderById($query){
        return $query->orderBy("$this->table.id");
    }  
    public function scopeOrderByDes($query){
        return $query->orderBy("$this->table.descripcion");
    }  
    public function scopeOrderByDesCategry($query){
        return $query->orderBy("listado_categorias.descripcion");
    } 


        
}