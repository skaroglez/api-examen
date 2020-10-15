<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\Administration\UserService;

class UserController extends Controller {
    private $userService;
    public function __construct(){
        $this->userService   = new UserService;
    }

    public function getAll() {
        $users =  $this->userService->getAll();
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    public function getById( $id ){
        $users =  $this->userService->getById( $id );
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }


    public function getByParams( Request $request ) {
        $users =  $this->userService->getByParams( $request );
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    public function getByName( $name ){
        $users =  $this->userService->getByUserName( $name );
        $data = $users[0];
        return response()->json([
            'success' => true,
            'data' => [$data],
        ]);
    }

    public function save( Request $request ){
        try {
            $user = $this->userService->getByUserName( $request->username );
            if( count($user) ){
                throw new \Exception("El usuario que intenta ingresar ya existe", 1);
            }
            $email = $this->userService->getByEmail( $request->email,0 );
            if( count($email) ){
                throw new \Exception("El correo que intenta ingresar ya existe", 1);
            }
            $user = $this->userService->save( $request );
            return response()->json([
                'success' => true,
                'data' => [$user],
                'message' => 'Usuario agregado correctamente'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'data' =>null,
                'message' => $th->getMessage()
            ]);
        }

    }

    public function update( Request $request, $id ){
        try {
            $email = $this->userService->getByEmail( $request->email,$id );
            if( count($email) ){
                throw new \Exception("El correo que intenta ingresar ya existe", 1);
            }

            $user = $this->userService->update( $request, $id );
            return response()->json([
                'success' => true,
                'data' => [$user],
                'message' => 'El usuario se actualizó correctamente'
            ]);
         } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'data' =>null,
                'message' => $th->getMessage()
            ]);
        }
    }
}
