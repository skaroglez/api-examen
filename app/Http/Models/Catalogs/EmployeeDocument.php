<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    protected $table = 'imagenes_empleados';
    protected $fillable = [
        'id',
        'nombre',
        'ruta',
        'empleado_id',
        'extension'
    ];

    public $timestamps = false;



    public function scopeWhereIdEmployee( $query, $idEmployee ) {
        return $query->where( "$this->table.empleado_id", $idEmployee );
    }
}