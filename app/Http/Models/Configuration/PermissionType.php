<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class PermissionType extends Model
{
    public $timestamps = false;

    protected $table = 'configuracion_tipos_permisos';

    protected $fillable = [
        'usuario_registra_id',
        'estatus_id',
        'descripcion',
        'fecha_registro'
    ];

    public function scopeWhereStatus($query, $status)
    {
        return $query->where( $this->table . '.estatus_id', $status);
    }

  
}
