<?php 
    namespace App\EntityFields\Catalogs;
    use App\Traits\FieldsTrait;

    class CategoryDocumentFields {
        use FieldsTrait;

        private $table = 'imagenes_categorias';

        private $fields = [
            'id'               => 'idDocument',
            'nombre'           => 'name',
            'ruta'             => 'link',
            'categoria_id'      => 'idCategory',
            'extension'        => 'ext'
        ];

        public function __construct(){
            $this->createFieldAS();
        }

    }

