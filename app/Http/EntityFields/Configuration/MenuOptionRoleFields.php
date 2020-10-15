<?php

namespace App\EntityFields\Configuration;

use App\Traits\FieldsTrait;

class MenuOptionRoleFields {
    use FieldsTrait;

    private $table = 'menu_opciones_roles';

    private $fields = [
        'id' => 'idMenuOptionRole',
        'menu_opcion_id' => 'idMenuOption',
        'rol_id' => 'idRole',
        'usuario_registra_id' => 'idUserRegister',
        'estatus_id' => 'idStatus',
    ];

    public function __construct() {
        $this->createFieldAs();
    }
}