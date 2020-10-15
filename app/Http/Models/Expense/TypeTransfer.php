<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;

class TypeTransfer extends Model
{
    protected $table = 'gasto_tipo_traspaso';
    protected $fillable = [
        'id',
        'descripcion',
        'nombre',
        'estatus_id'
    ];
    public $timestamps = false;

    public function scopeJoinStatus( $query ) {
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', 'gasto_tipo_traspaso.estatus_id');
    }

    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( 'gasto_tipo_traspaso.estatus_id', $idStatus );
    }
}
