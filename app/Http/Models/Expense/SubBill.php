<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;

class SubBill extends Model
{
    protected $table = 'gasto_subcuentas';
    protected $fillable = [
        'id',
        'subcuenta',
        'is_extra',
        'cuenta_id',
        'estatus_id'
    ];
    public $timestamps = false;

    public function scopeJoinStatus( $query ) {
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', 'gasto_subcuentas.estatus_id');
    }

    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( 'estatus_id', $idStatus );
    }
}
