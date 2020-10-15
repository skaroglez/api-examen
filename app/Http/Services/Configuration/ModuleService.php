<?php

    namespace App\Services\Configuration;

    use App\Models\Configuration\Module;
    use App\EntityFields\Configuration\ModuleFields;
    use App\EntityFields\Configuration\StatusFields;


    class ModuleServices
    {
        private $moduleFields;
        private $statusFields;
        private $moduleModel;

        public function __construct(){
            $this->moduleFields = new ModuleFields;
            $this->moduleModel = new Module;
            $this->statusFields = new StatusFields;
        }
        public function getAll(){
            return  $this->moduleModel->select( $this->moduleFields->getFieldsValuesAdd([ $this->statusFields->nameStatus ] ) )
            ->joinStatus()->get();
        }

        public function getById( $id ){
            return  $this->moduleModel->select( $this->moduleFields->getFieldsValues() )->where( 'id', $id )->get();
        }

        public function getByParams( $request ){
            $modules = $this->moduleModel
                ->select( $this->moduleFields->getFieldsValuesAdd([ $this->statusFields->nameStatus ] ) )
                ->joinStatus();
            if( $request->idStatus ) {
                $modules->whereStatus( $request->idStatus );
            }
            if( $request->nameModule ) {                    
                $modules->whereNameModule( $request->nameModule );
            }
            return  $modules->get();
        }

        public function save( $request ){     
            $moduleValues = $this->moduleFields->getValuesAssingned( $request->all() );
            $module = $this->moduleModel->create( $moduleValues );
            return $module;         
        }

        public function update( $request, $id ){
            $moduleValues = $this->moduleFields->getValuesAssingned( $request->all() );
            $module = $this->moduleModel->findOrFail( $id );
            $module->update( $moduleValues );
            return $module;
        }
    }