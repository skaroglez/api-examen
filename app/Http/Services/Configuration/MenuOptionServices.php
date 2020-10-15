<?php

    namespace App\Services\Configuration;

    use App\Models\Configuration\MenuOption;
    use App\EntityFields\Configuration\MenuOptionFields;
    use App\EntityFields\Configuration\ModuleFields;
    use App\EntityFields\Configuration\StatusFields;

    class MenuOptionService {
        private $menuOptionFields;
        private $statusFields;
        private $menuOptionModel;

        public function __construct(){
            $this->menuOptionFields = new MenuOptionFields;
            $this->moduleFields = new ModuleFields;
            $this->statusFields = new StatusFields;
            $this->menuOptionModel = new MenuOption;
        }
        public function getAll(){
            return $this->menuOptionModel->select( $this->menuOptionFields->getFieldsValues() )->get();
        }

        public function getById( $id ){
            return $this->menuOptionModel->select( $this->menuOptionFields->getFieldsValues() )->where( 'id', $id )->get();
        }

        public function getByParams( $request ){
            $modules = $this->menuOptionModel
                ->select( $this->menuOptionFields->getFieldsValuesAdd([ $this->statusFields->nameStatus, $this->moduleFields->nameModule ] ) )
                ->joinModules()
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
            $menuOptionRequest =  $request->all();
            $menuOptionValues = $this->menuOptionFields->getValuesAssingned( $menuOptionRequest );
            $menuOption = $this->menuOptionModel->create( $menuOptionValues );
            return [ 'idMenuOption' => $menuOption->id];         
        }

        public function update( $request, $id ){
            $menuOptionValues = $this->menuOptionFields->getValuesAssingned( $request->all() );
            $menuOption = $this->menuOptionModel->findOrFail( $id );
            $menuOption->update( $menuOptionValues );
            return [ 'idMenuOption' => $menuOption->id];   
        }
        
    }