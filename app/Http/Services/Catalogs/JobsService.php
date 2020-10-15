<?php 
    namespace App\Services\Catalogs;

    use App\Models\Catalogs\Jobs;

    use App\EntityFields\Catalogs\JobsFields;
    use App\EntityFields\Configuration\StatusFields;  

    class JobsService 
    {
        private $jobsModel;

        private $jobsFields;
        private $statusFields;            

        public function __construct(){
            $this->jobsModel = new Jobs;

            $this->jobsFields = new JobsFields;
            $this->statusFields = new StatusFields;               
        }

        public function getActives(){
            return  $this->jobsModel
                ->select( $this->jobsFields->getFieldsValues([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->whereStatus( $this->statusFields->active )
                ->orderByDes()
                ->get();
        }
    }