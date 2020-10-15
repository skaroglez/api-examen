<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Model;

class CategoriesList extends Model
{
    protected $table = 'listado_categorias';
    protected $fillable = [ 'id',		
                            'descripcion',           
                            'estatus_id',           
                            'fecha_registro',           
                            'usuario_registra_id'
                        ];
    public $timestamps = false;

    //JOIN
    public function scopeJoinStatus( $query ){
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', "$this->table.estatus_id");
    }  
    
    //WHERE
    public function scopeWhereIdCategory( $query, $idCategory ) {
        return $query->where( "$this->table.id", $idCategory );  
    }
    public function scopeWhereIsDifferentIdCategory( $query, $idCategory ) {
        return $query->where( "$this->table.id", "!=", $idCategory );  
    }
    public function scopeWhereDesCategory( $query, $desCategory ) {
        return $query->where( "$this->table.descripcion", 'like' , "%$desCategory%" );  
    }
    public function scopeWhereDesCategoryExact( $query, $desCategory ) {
        return $query->where( "$this->table.descripcion", $desCategory );  
    }
    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( "$this->table.estatus_id", '=' ,$idStatus );
    }

    //ORDER BY
    public function scopeOrderById($query){
        return $query->orderBy("$this->table.id");
    }  
    public function scopeOrderByDes($query){
        return $query->orderBy("$this->table.descripcion");
    }  


        
}