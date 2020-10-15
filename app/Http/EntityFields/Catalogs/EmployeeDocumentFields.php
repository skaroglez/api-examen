<?php 
    namespace App\EntityFields\Catalogs;
    use App\Traits\FieldsTrait;

    class EmployeeDocumentFields {
        use FieldsTrait;

        private $table = 'imagenes_empleados';

        private $fields = [
            'id'               => 'idDocument',
            'nombre'           => 'name',
            'ruta'             => 'link',
            'empleado_id'      => 'idEmployee',
            'extension'        => 'ext'
        ];

        public function __construct(){
            $this->createFieldAS();
        }

    }

