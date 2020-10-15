<?php 
    namespace App\Services\Administration;

    use App\EntityFields\Administration\RoleFields;
    use App\EntityFields\Configuration\StatusFields;
    use App\Models\Administration\Role;

    class RoleService 
    {
        private $roleFields;
        private $statusFields;
        private $roleModel;

        public function __construct(){
            $this->roleFields = new RoleFields;
            $this->statusFields = new StatusFields;
            $this->roleModel = new Role;
        }
        public function getAll(){
            return  $this->roleModel
                         ->select( $this->roleFields->getFieldsValuesAdd([$this->statusFields->nameStatus]) )
                         ->joinStatus()
                         ->paginate(15);
        }

        public function getActives(){
            return  $this->roleModel
                         ->select( $this->roleFields->getFieldsValues() )
                         ->whereStatus($this->statusFields->active)
                         ->get();
        }

        public function getByParams( $request ){
            $query = $this->roleModel
                          ->select( $this->roleFields->getFieldsValuesAdd([$this->statusFields->nameStatus]) )
                          ->joinStatus();
            if( $request->idStatus ){
                $query->whereStatus( $request->idStatus );
            }
            if ( $request->nameRole ){
                $query->where('configuracion_roles.nombre', 'LIKE', "%$request->nameRole%");
            }
            return $query->paginate(15);            
        }

        public function save( $request ){
            $roleValues = $this->roleFields->getValuesAssingned( $request->all() );
            $role = $this->roleModel->create( $roleValues );
            return $role;         
        }

        public function update( $request, $id ){
            $roleValues = $this->roleFields->getValuesAssingned( $request->all() );
            $role = $this->roleModel->findOrFail( $id );
            $role->update( $roleValues );
            return $role;
        }

    }