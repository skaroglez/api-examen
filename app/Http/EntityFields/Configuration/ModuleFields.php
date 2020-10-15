<?php

    namespace App\EntityFields\Configuration;

    use App\Traits\FieldsTrait;

   class ModuleFields {
        use FieldsTrait;

        private $table = "configuracion_modulos";
        private $fields = [
            "id" => "idModule",
            "nombre" => "nameModule",
            "estatus_id" => "idStatus",
            "icono" => "icon",
        ];

        public function __construct()
        {
            $this->createFieldAs();
        }
    }