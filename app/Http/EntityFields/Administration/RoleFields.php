<?php 
    namespace App\EntityFields\Administration;
    use App\Traits\FieldsTrait;

    class RoleFields{
        use FieldsTrait;

        private $table = 'configuracion_roles';

        private $fields = [
            'id' => 'idRole',
            'nombre' => 'nameRole',
            'estatus_id' => 'idStatus',
        ];

        public function __construct(){
            $this->createFieldAS();
        }
        
    }

