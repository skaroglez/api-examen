<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;
use App\EntityFields\Configuration\StatusFields;

class MenuOption extends Model
{
    private $statusFields;

    protected $table = "configuracion_menu_opciones";
    protected $fillable = ['nombre', 'modulo_id', 'estatus_id', 'icono', 'url'];
    public $timestamps = false;

    public function scopeJoinStatus( $query ){
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', $this->table.'.estatus_id');
    }

    public function scopeJoinModules( $query ){
        return $query->join("configuracion_modulos", 'configuracion_modulos.id', '=', 'modulo_id');
    }

  

    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( $this->table.'.estatus_id', $idStatus );
    }

    public function scopeWhereNameModule( $query, $nameModule ) {
        return $query->where( $this->table.'.nombre', 'like', "%$nameModule%" );
    }

    
}
