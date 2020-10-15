<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    protected $table = 'configuracion_horarios';
    protected $fillable = [ 'id',		
                            'descripcion',    
                            'horas',        
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
    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( "$this->table.estatus_id", '=' ,$idStatus );
    }

    //ORDER BY
    public function scopeOrderByDes($query){
        return $query->orderBy("$this->table.descripcion");
    }  
}