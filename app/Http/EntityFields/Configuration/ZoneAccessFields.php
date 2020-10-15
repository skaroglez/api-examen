<?php

namespace App\EntityFields\Configuration;

use App\Traits\FieldsTrait;

class ZoneAccessFields  
{
    use FieldsTrait;

    private $table = "configuracion_acceso_zona";
    private $fields = [
        "id" => "idZoneAccess",
        "usuario_id" => "idUser",
        "zona_id" => "idZone",        
        "estatus_id" => "idStatus",
        'fecha_registro' => 'registrationDate',
        'usuario_registro_id' => 'userRegisterID' 
    ];

    public function __construct()
    {
        $this->createFieldAS();
    }
}
