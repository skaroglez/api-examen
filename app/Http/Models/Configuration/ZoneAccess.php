<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class ZoneAccess extends Model
{
    protected $table = "configuracion_acceso_zona";
    protected $fillable = [
        "id",
        "usuario_id",
        "zona_id",
        "estatus_id",
        "fecha_registro",
        "usuario_registro_id"
    ];

    public $timestamps = false;
}
