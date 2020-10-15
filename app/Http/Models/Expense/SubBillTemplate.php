<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;

class SubBillTemplate extends Model
{
    protected $table = 'gasto_subcuenta_plantilla';
    protected $fillable = [
        'id',
        'monto',
        'periodo',
        'cuenta_id',
        'estatus_id',
        'sucursal_id',
        'subCuenta_id',
        'plantilla_id',
        'periodo_valor',
        'plantilla_customizada_id'
    ];
    public $timestamps = false;

    public function scopeJoinStatus( $query ) {
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', 'gasto_subcuenta_plantilla.estatus_id');
    }

    public function scopeJoinSubBills( $query ) {
        return $query->join("gasto_subcuentas", 'gasto_subcuentas.id', '=', 'gasto_subcuenta_plantilla.subCuenta_id');
    }

    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( 'gasto_subcuenta_plantilla.estatus_id', $idStatus );
    }

}
