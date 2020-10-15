<?php
namespace App\EntityFields\Configuration;

use App\Traits\FieldsTrait;

class PermissionTypeFields
{
    use FieldsTrait;

    private $table = 'configuracion_tipos_permisos';

    private $fields = [
        'id' => 'idPermissionType',
        'descripcion' => 'namePermissionType',
        'estatus_id' => 'idStatus'
    ];

    public function __construct()
    {
        $this->createFieldAS();
    }

}
