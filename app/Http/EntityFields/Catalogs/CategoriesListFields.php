<?php 
    namespace App\EntityFields\Catalogs;
    use App\Traits\FieldsTrait;

    class CategoriesListFields{
        use FieldsTrait;

        private $table = 'listado_categorias';

        private $fields = [
            'id' => 'idCategory',
            'descripcion' => 'desCategory',
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

