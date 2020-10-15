<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'gasto_cuentas';
    protected $fillable = [
        'id',
        'concepto',
        'estatus_id'
    ];
    public $timestamps = false;

    public function scopeJoinStatus( $query ) {
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', 'gasto_cuentas.estatus_id');
    }
    
    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( 'estatus_id', $idStatus );
    }
}
