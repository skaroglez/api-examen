<?php 
    namespace App\EntityFields\Configuration;
    use App\Traits\FieldsTrait;

    class SchedulesFields{
        use FieldsTrait;

        private $table = 'configuracion_horarios';

        private $fields = [
            'id'                    => 'idSchedule',
            'descripcion'           => 'desSchedule',
            'horas'                 => 'hours',
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

