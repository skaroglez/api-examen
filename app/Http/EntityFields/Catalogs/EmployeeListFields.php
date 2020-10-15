<?php 
    namespace App\EntityFields\Catalogs;
    use App\Traits\FieldsTrait;

    class EmployeesListFields{
        use FieldsTrait;

        private $table = 'listado_empleados';

        private $fields = [
            'id'                    => 'idEmployee',
            'primer_nombre'         => 'firstName',
            'segundo_nombre'        => 'middleName',
            'apellido_paterno'      => 'lastName',
            'apellido_materno'      => 'secondLastName',
            'fecha_nacimiento'      => 'birthdate',
            'sexo'                  => 'sex',
            'puesto_id'             => 'idJob',
            'horario_id'            => 'idSchedule',
            'fecha_ingreso'         => 'admissionDate',
            'fecha_baja'            => 'lowDate',
            'estatus_id'            => 'idStatus',
            'usuario_registra_id'   => 'userRegisterID'
        ];

        public $active = 1;
        public $inactive = 2;
        public $removed = 3;            

        public function __construct(){
            $this->createFieldAS();
        }
        
    }

