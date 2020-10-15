<?php

    namespace App\EntityFields\Configuration;

    use App\Traits\FieldsTrait;

   class MenuOptionRolePermissionTypeFields {
        use FieldsTrait;

        private $table = "menu_opciones_roles_tipos_permisos";
        private $fields = [
            "id" => "idMenuOptionRolePermissiontype",
            "menu_opcion_rol_id" => "idMenuOptionRole",
            "tipo_permiso_id" => "idPermissionType",
            "estatus_id" => "idStatus",
            "usuario_registra_id" => "idUserRegister",
        ];

        public function __construct()
        {
            $this->createFieldAs();
        }
    }