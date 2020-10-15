<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Model;

class EmployeesList extends Model
{
    protected $table = 'listado_empleados';
    protected $fillable = [ 
                        'id',
                        'primer_nombre',
                        'segundo_nombre',
                        'apellido_paterno',
                        'apellido_materno',
                        'fecha_nacimiento',
                        'sexo',
                        'puesto_id',
                        'horario_id',
                        'fecha_ingreso',
                        'fecha_baja',
                        'estatus_id',
                        'usuario_registra_id'
                        ];
    public $timestamps = false;

    //JOIN
    public function scopeJoinStatus( $query ){
        return $query->join("configuracion_estatus", 'configuracion_estatus.id', '=', "$this->table.estatus_id");
    }  
    public function scopeJoinJobs( $query ){
        return $query->join("listado_puestos", 'listado_puestos.id', '=', "$this->table.puesto_id");
    }  
    public function scopeJoinSchedules( $query ){
        return $query->join("configuracion_horarios", 'configuracion_horarios.id', '=', "$this->table.horario_id");
    }  
    
    //WHERE
    public function scopeWhereIdEmployee( $query, $idEmployee ) {
        return $query->where( "$this->table.id", $idEmployee );  
    }
    public function scopeWhereIsDifferentIdEmployee( $query, $idEmployee ) {
        return $query->where( "$this->table.id", "!=", $idEmployee );  
    }
    public function scopeWhereFirstName( $query, $firstName ) {
        return $query->where( "$this->table.primer_nombre", 'like' , "%$firstName%" );  
    }
    public function scopeWhereMiddleName( $query, $middleName ) {
        return $query->where( "$this->table.segundo_nombre", 'like' , "%$middleName%" );  
    }
    public function scopeWhereLastName( $query, $lastName ) {
        return $query->where( "$this->table.apellido_paterno", 'like' , "%$lastName%" );  
    }
    public function scopeWhereSecondLastName( $query, $secondLastName ) {
        return $query->where( "$this->table.apellido_materno", 'like' , "%$secondLastName%" );  
    }
    public function scopeWhereFirstNameExact( $query, $firstName ) {
        return $query->where( "$this->table.primer_nombre", $firstName );  
    }
    public function scopeWhereMiddleNameExact( $query, $middleName ) {
        return $query->where( "$this->table.segundo_nombre", $middleName);
    }
    public function scopeWhereLastNameExact( $query, $lastName ) {
        return $query->where( "$this->table.apellido_paterno", $lastName);
    }
    public function scopeWhereSecondLastNameExact( $query, $secondLastName ) {
        return $query->where( "$this->table.apellido_materno", $secondLastName);
    }
    public function scopeWhereStatus( $query, $idStatus = 1 ) {
        return $query->where( "$this->table.estatus_id", '=' ,$idStatus );
    }

    //ORDER BY
    public function scopeOrderById($query){
        return $query->orderBy("$this->table.id");
    }  
    public function scopeOrderByFirstName($query){
        return $query->orderBy("$this->table.primer_nombre");
    }  


        
}