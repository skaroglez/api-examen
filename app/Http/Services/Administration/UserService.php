<?php

    namespace App\Services\Administration;

    use App\EntityFields\Administration\UserFields;
    use App\EntityFields\Configuration\StatusFields;
    use App\EntityFields\Administration\RoleFields;
    use App\Models\Administration\User;    

    class UserService
    {
        private $userFields;
        private $roleFields;
        private $statusFields;
        private $userModel;

        public function __construct(){
            $this->userFields = new UserFields;
            $this->userModel = new User;
            $this->statusFields = new StatusFields;
            $this->roleFields = new RoleFields;
        }
        public function getAll() {
            return  $this->userModel->select( $this->userFields->getFieldsValues() )->get();
        }

        public function getById( $id ){
            $user =  $this->userModel
                ->select( $this->userFields->getFieldsValuesAdd([
                    $this->roleFields->nameRole
                ]))
                ->joinRole()
                ->where( 'listado_usuarios.id', $id )
                ->get();
            return $user;
        }
    
        public function getByParams( $request ) {
            $user = $this->userModel
                ->select($this->userFields->getFieldsValuesAdd([
                    $this->statusFields->nameStatus,
                    $this->roleFields->nameRole
                ]))
                ->joinStatus()
                ->joinRole();
                
            if( $request->idStatus ) {
                $user->whereStatus( $request->idStatus );
            }
            if( $request->userName ) {                    
                $user->whereName( $request->userName );
            }

            if( $request->idRole ) {                    
                $user->whereIdRole( $request->idRole );
            }
            if( $request->email ) {                    
                $user->whereEmail( $request->email );
            }

            return $user->paginate(10);
        }

        public function save( $request ){
            $userRequest = $request->all();        
            $userRequest['password'] = md5( $userRequest['password'] );
            $userValues = $this->userFields->getValuesAssingned( $userRequest );
            $user = $this->userModel->create( $userValues );

            return array('idUser' => $user->id);         
        }

        public function update( $request, $id ){
            $userRequest =  $request->all();
            if( !$userRequest['password'] ) {
                unset($userRequest['password']);
            }else {
                $userRequest['password'] = md5( $userRequest['password'] );
            }
            $userValues = $this->userFields->getValuesAssingned( $userRequest );
            $user = $this->userModel->findOrFail( $id );
            $user->update( $userValues );
            return array('idUser' => $user->id);
        }
        public function getByUserName( $username ){
            $user =  $this->userModel
                ->select( $this->userFields->getFieldsValuesAdd([
                    $this->roleFields->nameRole
                ]))
                ->joinRole()
                ->where( 'listado_usuarios.nombre','like', $username )
                ->get();
            return $user;
        }
        public function getByEmail( $email, $idUser ){
             $users = $this->userModel
                ->select($this->userFields->getFieldsValues())
                ->where( 'listado_usuarios.correo','like', $email );
                if($idUser>0){
                    $users->where( 'listado_usuarios.id','!=', $idUser );
                }

                return $users->get();
        }
    }
    