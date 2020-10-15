<?php 
    namespace App\EntityFields\Administration;
    use App\Traits\FieldsTrait;

    class UserFields{
        use FieldsTrait;

        private $table = 'listado_usuarios';

        private $fields = [
            'id'            => 'idUser',
            'nombre'        => 'username',
            'correo'        => 'email',
            'contrasena'    => 'password',
            'rol_id'        => 'idRole',
            'estatus_id'    => 'idStatus',
        ];

        public function __construct(){
            $this->createFieldAS();
        }     
        
    }

