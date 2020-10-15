<?php

    namespace App\Services\Configuration;

    use App\Models\Configuration\MenuOptionRolePermissionType;
    use App\EntityFields\Configuration\MenuOptionRolePermissionTypeFields;
    use App\EntityFields\Configuration\StatusFields;
    use Illuminate\Support\Facades\Auth;
    
    class MenuOptionRolePermissionTypeService {
        private $menuOptionRolePermissionTypeFields;
        private $statusFields;
        private $menuOptionRolePermissionTypeModel;

        public function __construct(){
            $this->menuOptionRolePermissionTypeFields = new MenuOptionRolePermissionTypeFields;
            $this->statusFields = new StatusFields;
            $this->menuOptionRolePermissionTypeModel = new MenuOptionRolePermissionType;
        }
        public function getByRole( $idRole ){
            return $this->menuOptionRolePermissionTypeModel->select( 
                $this->menuOptionRolePermissionTypeFields->getFieldsValues() 
            )
            ->joinMenuOptionRole()
            ->whereIdRole( $idRole )
            ->whereIdStatus( $this->statusFields->active )
            ->get();
        }

        public function save( $request ){
            $request->merge(['idUserRegister' => Auth::id()]);
            $menuOptionRolePermissionTypeRequest =  $request->all();
            $menuOptionRolePermissionTypeValues = $this->menuOptionRolePermissionTypeFields->getValuesAssingned( $menuOptionRolePermissionTypeRequest );
            $menuOptionRolePermissionType = $this->menuOptionRolePermissionTypeModel->create( $menuOptionRolePermissionTypeValues );
            return [ 'idMenuOptionRolePermissionType' => $menuOptionRolePermissionType->id];         
        }

        public function delete( $idMenuOptionRolePermissionType ) {
            $menuOptionRolePermissionTypeValues = $this->menuOptionRolePermissionTypeFields->getValuesAssingned([
                'idStatus' => $this->statusFields->removed
            ]);
            $menuOptionRolePermissionType = $this->menuOptionRolePermissionTypeModel->findOrFail( $idMenuOptionRolePermissionType );
            $menuOptionRolePermissionType->update( $menuOptionRolePermissionTypeValues );
            return $menuOptionRolePermissionType;
        }

        public function deleteByMenuOptionRole( $idMenuOptionRole ) { 
            $menuOptionRolePermissionTypeValues = $this->menuOptionRolePermissionTypeFields->getValuesAssingned([
                'idStatus' => $this->statusFields->removed
            ]);
            $menuOptionRolePermissionType = $this->menuOptionRolePermissionTypeModel
                ->whereMenuOptionRole( $idMenuOptionRole )
                ->update( $menuOptionRolePermissionTypeValues );
            return $menuOptionRolePermissionType;
        }
        
    }