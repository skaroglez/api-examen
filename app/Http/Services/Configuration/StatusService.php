<?php

    namespace App\Services\Configuration;

    use App\Models\Configuration\Status;
    use App\EntityFields\Configuration\StatusFields;


    class StatusServices
    {
        private $statusFields;
        private $statusModel;

        public function __construct(){
            $this->statusFields = new StatusFields;
            $this->statusModel = new Status;
        }
        public function getAll(){
            return  $this->statusModel->select( $this->statusFields->getFieldsValues() )
                ->whereNotDelete()
                ->get();
        }

        public function getById( $id ){
            return  $this->statusModel->select( $this->statusFields->getFieldsValues() )->where( 'id', $id )->get();
        }

        public function save( $request ){     
            $statusValues = $this->statusFields->getValuesAssingned( $request->all() );
            $status = $this->statusModel->create( $statusValues );
            return $status;         
        }

        public function update( $request, $id ){
            $statusValues = $this->statusFields->getValuesAssingned( $request->all() );
            $status = $this->statusModel->findOrFail( $id );
            $status->update( $statusValues );
            return $status;
        }
    }