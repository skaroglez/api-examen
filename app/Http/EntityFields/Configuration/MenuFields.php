<?php

    namespace App\EntityFields\Configuration;

    use App\Traits\FieldsTrait;

    class MenuFields {
        use FieldsTrait;

        private $table = 'menu';

        private $fields = [
            'id' => 'idMenu',
            'descripcion' => 'description',
            'icono' => 'icon'
        ];

        public function __construct() {
            $this->createFieldAs();
        }
    }
