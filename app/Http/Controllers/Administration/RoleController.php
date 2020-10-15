<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Administration\RoleService;

class RoleController extends Controller
{
    private $roleService;
    public function __construct(){
        $this->roleService = new RoleService;
    }
    public function getAll(){
        $roles =  $this->roleService->getAll();
        return response()->json([
            'success' => true,
            'data' => $roles
        ]);
    }

    public function getActives(){
        $roles =  $this->roleService->getActives();
        return response()->json([
            'success' => true,
            'data' => $roles
        ]);
    }

    public function getByParams( Request $request ){
        $roles =  $this->roleService->getByParams($request);
        return response()->json([
            'success' => true,
            'data' => $roles
        ]);
    }

    public function save( Request $request ){
        $role = $this->roleService->save( $request );
        return response()->json([
            'success' => true,
            'data' => $role
        ]);
    }

    public function update( Request $request, $id ){
        $role = $this->roleService->update( $request, $id );
        return response()->json([
            'success' => true,
            'data' => $role
        ]);
    }
}
