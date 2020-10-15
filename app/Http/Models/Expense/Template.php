<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'gasto_plantilla';
    protected $fillable = [
        'id',
        'sucursal_id',
        'estatus_id',
        'cuenta_id',
        'plantilla_customizada_id'
    ];
    public $timestamps = false;

    public function scopeJoinStatus( $query ) {
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', 'gasto_plantilla.estatus_id');
    }

    public function scopeJoinBills( $query ) {
        return $query->join("gasto_cuentas", 'gasto_cuentas.id', '=', 'gasto_plantilla.cuenta_id')
                    ->leftJoin("catalogo_sucursales", 'catalogo_sucursales.id', '=', 'gasto_plantilla.sucursal_id');
    }

    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( 'gasto_plantilla.estatus_id', $idStatus );
    }
}
