<?php 
    namespace App\EntityFields\Catalogs;
    use App\Traits\FieldsTrait;

    class JobsFields{ use FieldsTrait;

        private $table = 'listado_puestos';

        private $fields = [
            'id'            => 'idJob',
            'descripcion'   => 'desJob',
            'estatus_id'    => 'idStatus',
            'usuario_registra_id'   => 'userRegisterID'
        ];

        public $active = 1;
        public $inactive = 2;
        public $removed = 3;            

        public function __construct(){
            $this->createFieldAS();
        }
        
    }

