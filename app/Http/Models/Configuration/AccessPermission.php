<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class AccessPermission extends Model
{
    public $timestamps = false;

    protected $table = 'accesos_permisos';

    protected $fillable = [
        'usuario_registra_id',
        'estatus_id',
        'tipo_permiso_id',
        'acceso_id'
    ];


    public function scopeJoinPermissionsTypes($query) 
    {
        return $query->join('configuracion_tipos_permisos', 'configuracion_tipos_permisos.id', 'accesos_permisos.tipo_permiso_id');
    }

    public function scopeRightJoinPermissionsTypes($query) 
    {
        return $query->rightJoin('configuracion_tipos_permisos', 'configuracion_tipos_permisos.id', 'accesos_permisos.tipo_permiso_id');
    }
  
}
