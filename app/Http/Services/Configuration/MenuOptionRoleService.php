<?php

    namespace App\Services\Configuration;

    use App\Models\Configuration\MenuOptionRole;
    use App\EntityFields\Configuration\MenuOptionRoleFields;
    use App\EntityFields\Configuration\StatusFields;
    use Illuminate\Support\Facades\Auth;
    
    class MenuOptionRoleService {
        private $menuOptionRoleFields;
        private $statusFields;
        private $menuOptionRoleModel;

        public function __construct(){
            $this->menuOptionRoleFields = new MenuOptionRoleFields;
            $this->statusFields = new StatusFields;
            $this->menuOptionRoleModel = new MenuOptionRole;
        }
        public function getByRole( $idRole ){
            return $this->menuOptionRoleModel->select( 
                $this->menuOptionRoleFields->getFieldsValues() 
            )
            ->whereIdRole( $idRole )
            ->whereIdStatus( $this->statusFields->active )
            ->get();
        }

        public function save( $request ){
            $request->merge(['idUserRegister' => Auth::id()]);
            $menuOptionRoleRequest =  $request->all();
            $menuOptionRoleValues = $this->menuOptionRoleFields->getValuesAssingned( $menuOptionRoleRequest );
            $menuOptionRole = $this->menuOptionRoleModel->create( $menuOptionRoleValues );
            return [ 'idMenuOptionRole' => $menuOptionRole->id];         
        }

        public function delete( $idMenuOptionRole ) {
            $menuOptionRoleValues = $this->menuOptionRoleFields->getValuesAssingned([
                'idStatus' => $this->statusFields->removed
            ]);
            $menuOptionRole = $this->menuOptionRoleModel->findOrFail( $idMenuOptionRole );
            $menuOptionRole->update( $menuOptionRoleValues );
            return $menuOptionRole;
        }
        
    }