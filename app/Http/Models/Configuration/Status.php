<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "configuracion_estatus";
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function scopeWhereNotDelete( $query ){
        return $query->where( $this->table . '.id', '!=', 3);
    }
}
