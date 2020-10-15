<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table = 'gasto_traspasos';
    protected $fillable = [
        'id',
        'sucursal_origen_id',
        'sucursal_destino_id',
        'monto',
        'disponible',
        'tipo_traspaso_id',
        'sucursal_origen_descripcion',
        'sucursal_destino_descripcion',
        'comentario_traspaso',
        'estatus_traspaso',
        'conceptos',
        'estatus_id'
    ];
    public $timestamps = false;

    public function scopeJoinStatus( $query ) {
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', 'gasto_traspasos.estatus_id');
    }

    public function scopeJoinTypeTransfer( $query ) {
        return $query->join("gasto_tipo_traspaso", 'gasto_tipo_traspaso.id', '=', 'gasto_traspasos.tipo_traspaso_id');
    }

    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( 'gasto_plantilla.estatus_id', $idStatus );
    }
}
