<?php

namespace App\EntityFields\Configuration;

use App\Traits\FieldsTrait;

class MenuOptionFields
{
    use FieldsTrait;

    private $table = "configuracion_menu_opciones";
    private $fields = [
        'id' => 'idMenuOption',
        'nombre' => 'nameMenuOption',
        'icono' => 'icon',
        'modulo_id' => 'idModule',
        'estatus_id' => 'idStatus',
        'url' => 'urlMenuOption'
    ];

    public function __construct()
    {
        $this->createFieldAs();
    }
}
