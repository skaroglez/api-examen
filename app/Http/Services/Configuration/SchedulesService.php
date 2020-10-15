<?php 
    namespace App\Services\Configuration;

    use App\Models\Configuration\Schedules;

    use App\EntityFields\Configuration\SchedulesFields;
    use App\EntityFields\Configuration\StatusFields;  

    class SchedulesService 
    {
        private $schedulesModel;

        private $schedulesFields;
        private $statusFields;            

        public function __construct(){
            $this->schedulesModel = new Schedules;

            $this->schedulesFields = new SchedulesFields;
            $this->statusFields = new StatusFields;               
        }

        public function getActives(){
            return  $this->schedulesModel
                ->select( $this->schedulesFields->getFieldsValues([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->whereStatus( $this->statusFields->active )
                ->orderByDes()
                ->get();
        }
    }