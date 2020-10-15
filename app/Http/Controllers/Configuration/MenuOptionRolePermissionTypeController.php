<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Configuration\MenuOptionRolePermissionTypeService;


class MenuOptionRolePermissionTypeController extends Controller {
    
    private $moduleService;
    public function __construct(){
        $this->menuOptionRolePermissionTypeService = new MenuOptionRolePermissionTypeService;
    }
    public function getByRole( $idRole ){
        $menuOptionRole =  $this->menuOptionRolePermissionTypeService->getByRole( $idRole );
        return response()->json([
            'success' => true,
            'data' => $menuOptionRole
        ]);
    }

    public function save( Request $request ){
        $menuOptionRole =  $this->menuOptionRolePermissionTypeService->save( $request );
        return response()->json([
            'success' => true,
            'data' => [$menuOptionRole]
        ]);
    }

    public function delete( $id ){
        $menuOptionRole =  $this->menuOptionRolePermissionTypeService->delete( $id );
        return response()->json([
            'success' => true,
            'data' => $menuOptionRole
        ]);
    }

}
