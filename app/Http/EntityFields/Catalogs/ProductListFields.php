<?php 
    namespace App\EntityFields\Catalogs;
    use App\Traits\FieldsTrait;

    class ProductListFields{
        use FieldsTrait;

        private $table = 'listado_productos';

        private $fields = [
            'id' => 'idProduct',
            'descripcion' => 'desProduct',
            'categoria_id'=> 'idCategory',
            'estatus_id' => 'idStatus',
            'fecha_registro' => 'registrationDate',
            'usuario_registra_id' => 'userRegisterID' 
        ];

        public $active = 1;
        public $inactive = 2;
        public $removed = 3;            

        public function __construct(){
            $this->createFieldAS();
        }
        
    }

