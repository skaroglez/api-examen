<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\EntityFields\Administration\UserFields;
use App\EntityFields\Administration\CapturistFields;

class User extends Authenticatable implements JWTSubject{

    protected $table = "listado_usuarios";    
    protected $fillable = [ 
        "id", 
        "nombre", 
        "correo",
        "contrasena", 
        "rol_id", 
        "estatus_id" 
    ];
    public $timestamps = false;
    
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function scopeJoinStatus( $query ){
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', $this->table.'.estatus_id');
    }

    public function scopeJoinRole( $query ){
        return $query->join("configuracion_roles", 'configuracion_roles.id', '=', $this->table.'.rol_id');
    }

    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( $this->table.'.estatus_id', $idStatus );
    }

    public function scopeWhereName( $query, $userName ) {
        return $query->where( $this->table. '.nombre', 'like', "%$userName%" );
    }

    public function scopeWhereIdRole( $query, $idRole ) {
        return $query->where( $this->table.'.rol_id', $idRole );
    }
    public function scopeWhereEmail( $query, $email ) {
        return $query->where( $this->table.'.correo','like', "%$email%");
    }
    
}