<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Configuration\MenuOptionRoleService;
use App\Services\Configuration\MenuOptionRolePermissionTypeService;


class MenuOptionRoleController extends Controller {
    
    private $moduleService;
    private $menuOptionRolePermissionTypeService;
    public function __construct(){
        $this->menuOptionRoleService = new MenuOptionRoleService;
        $this->menuOptionRolePermissionTypeService = new MenuOptionRolePermissionTypeService;
    }
    public function getByRole( $idRole ){
        $menuOptionRole =  $this->menuOptionRoleService->getByRole( $idRole );
        return response()->json([
            'success' => true,
            'data' => $menuOptionRole
        ]);
    }

    public function save( Request $request ){
        $menuOptionRole =  $this->menuOptionRoleService->save( $request );
        return response()->json([
            'success' => true,
            'data' => [$menuOptionRole]
        ]);
    }

    public function delete( $id ){
        try {
            $menuOptionRole =  $this->menuOptionRoleService->delete( $id );

            $this->menuOptionRolePermissionTypeService->deleteByMenuOptionRole( $id );
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'data' =>null,
                'message' => $th->getMessage()
            ]);
        }     
        return response()->json([
            'success' => true,
            'data' => $menuOptionRole
        ]);
    }

}
