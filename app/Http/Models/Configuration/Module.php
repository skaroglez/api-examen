<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = "configuracion_modulos";
    protected $fillable = ['nombre', 'estatus_id', 'icono'];
    public $timestamps = false;

    public function scopeJoinStatus( $query ){
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', 'estatus_id');
    }

    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( 'estatus_id', $idStatus );
    }

    public function scopeWhereNameModule( $query, $nameModule ) {
        return $query->where( $this->table.'.nombre', 'like', "%$nameModule%" );
    }
}
