<?php

    namespace App\EntityFields\Configuration;

    use App\Traits\FieldsTrait;

   class StatusFields {
        use FieldsTrait;

        private $table = "configuracion_estatus";
        private $fields = [
            "id" => "idStatus",
            "nombre" => "nameStatus",            
        ];
        public $active = 1;
        public $inactive = 2;
        public $removed = 3;
        
        public function __construct()
        {
            $this->createFieldAs();
        }
    }