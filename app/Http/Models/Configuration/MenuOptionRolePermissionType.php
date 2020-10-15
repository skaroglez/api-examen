<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;


class MenuOptionRolePermissionType extends Model
{
    protected $table = "menu_opciones_roles_tipos_permisos";
    protected $fillable = [
        'menu_opcion_rol_id',
        'tipo_permiso_id',
        'usuario_registra_id',
        'estatus_id'
    ];
    public $timestamps = false;


    public function scopeJoinStatus($query) 
    {
        return $query->join('configuracion_estatus', 'configuracion_estatus.id', 'configuracion_menu_opciones_empresas.estatus_id');
    }

    public function scopeJoinMenuOptionRole($query)
    {
        return $query->join('menu_opciones_roles', 'menu_opciones_roles.id', $this->table . '.menu_opcion_rol_id');
    }

    public function scopeJoinCompanies($query)
    {
        return $query->join('catalogo_empresas', 'catalogo_empresas.id', 'configuracion_menu_opciones_empresas.empresa_id');
    }

    public function scopeWhereIdRole($query, $idRole) 
    {
        return $query->where( 'menu_opciones_roles.rol_id', $idRole);
    }

    public function scopeWhereIdStatus($query, $id)
    {
        return $query->where( $this->table . '.estatus_id', $id);
    }

    public function scopeWhereNotDeleted( $query, $idStatus ) {
        return $query->where( $this->table . '.estatus_id', '!=', $idStatus );
    }

    public function scopeWhereMenuOptionRole( $query, $idMenuOptionRole ) {
        return $query->where( $this->table . '.menu_opcion_rol_id', $idMenuOptionRole );
    }
}
