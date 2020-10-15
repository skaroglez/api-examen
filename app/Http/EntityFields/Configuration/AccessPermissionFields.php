<?php
namespace App\EntityFields\Configuration;

use App\Traits\FieldsTrait;

class AccessPermissionFields
{
    use FieldsTrait;

    private $table = 'accesos_permisos';

    private $fields = [
        'id' => 'idAccessPermission',
        'tipo_permiso_id' => 'idPermissionType',
        'estatus_id' => 'idAccessPermissionStatus',
        'acceso_id' => 'idAccess',
        'usuario_registra_id' => 'idUser'
    ];

    public function __construct()
    {
        $this->createFieldAS();
    }

}
