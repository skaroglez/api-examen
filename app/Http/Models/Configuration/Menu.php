<?php

namespace App\Models\configuracion;

use Illuminate\Database\Eloquent\Model;
use App\EntityFields\Configuration\MenuFields;

class Menu extends Model {
    // protected $table = "menu";
    protected $table = "menu";
    protected $menuFields;

    public function __construct() {
        // $this->menuFields = new MenuFields;
    }

    // public function scopeGetAll($query) {
    //     return $query->select();

    //     // $a = $this->menuFields->getFieldsValues();
    //     // var_dump($this->menuFields);
    //     // var_dump($this->menuFields);
    //     // die();
    // }
}
