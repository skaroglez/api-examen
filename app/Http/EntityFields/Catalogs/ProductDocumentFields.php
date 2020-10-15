<?php 
    namespace App\EntityFields\Catalogs;
    use App\Traits\FieldsTrait;

    class ProductDocumentFields {
        use FieldsTrait;

        private $table = 'imagenes_productos';

        private $fields = [
            'id'               => 'idImage',
            'nombre'           => 'name',
            'ruta'             => 'link',
            'producto_id'      => 'idProduct',
            'extension'        => 'ext'
        ];

        public function __construct(){
            $this->createFieldAS();
        }

    }

