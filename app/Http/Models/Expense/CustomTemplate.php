<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;

class CustomTemplate extends Model
{
    protected $table = 'gasto_plantilla_customizada';
    protected $fillable = [
        'id',
        'nombre',
        'estatus_id',
        'descripcion',
    ];
    public $timestamps = false;

    public function scopeJoinStatus( $query ) {
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', 'gasto_plantilla_customizada.estatus_id');
    }

    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( 'gasto_plantilla_customizada.estatus_id', $idStatus );
    }

}
