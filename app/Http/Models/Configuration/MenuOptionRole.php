<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;


class MenuOptionRole extends Model
{
    protected $table = "menu_opciones_roles";
    protected $fillable = [
        'menu_opcion_id',
        'rol_id',
        'usuario_registra_id',
        'estatus_id'
    ];
    public $timestamps = false;


    public function scopeJoinStatus($query) 
    {
        return $query->join('configuracion_estatus', 'configuracion_estatus.id', 'configuracion_menu_opciones.estatus_id');
    }



  
    public function scopeWhereIdRole($query, $idRole) 
    {
        return $query->where( $this->table . '.rol_id', $idRole);
    }

    public function scopeWhereMenuOption($query, $id)
    {
        return $query->where('configuracion_menu_opciones.menu_opcion_id', $id);
    }

    public function scopeWhereModule($query, $id)
    {
        return $query->where('configuracion_menu_opciones.modulo_id', $id);
    }

    public function scopeWhereIdStatus($query, $id)
    {
        return $query->where( $this->table . '.estatus_id', $id);
    }

    public function scopeWhereNotDeleted( $query, $idStatus ) {
        return $query->where( $this->table . '.estatus_id', '!=', $idStatus );
    }
}
