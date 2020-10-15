<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps;
    protected $table = 'configuracion_roles';
    protected $fillable = ['id', 'nombre', 'estatus_id'];

    public function scopeJoinStatus( $query ){
        return $query->join('configuracion_estatus', 'configuracion_estatus.id', '=', 'estatus_id');
    }

    public function scopeWhereStatus( $query, $idStatus ){
        return $query->where('configuracion_roles.estatus_id', $idStatus);
    }
}
