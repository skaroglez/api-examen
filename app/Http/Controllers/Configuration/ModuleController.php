<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Configuration\ModuleServices;


class ModuleController extends Controller {
    
    private $moduleService;
    public function __construct(){
        $this->moduleService = new ModuleServices;
    }
    public function getAll(){
        $modules =  $this->moduleService->getAll();
        return response()->json([
            'success' => true,
            'data' => $modules
        ]);
    }

    public function getById( $id ){
        $modules =  $this->moduleService->getById( $id );
        return response()->json([
            'success' => true,
            'data' => $modules
        ]);
    }

    public function getByParams( Request $request ){
        $modules =  $this->moduleService->getByParams( $request );
        return response()->json([
            'success' => true,
            'data' => $modules
        ]);
    }

    public function save( Request $request ){
        $module = $this->moduleService->save( $request );
        return response()->json([
            'success' => true,
            'data' => $module
        ]);
    }

    public function update( Request $request, $id ){
        $module = $this->moduleService->update( $request, $id );
        return response()->json([
            'success' => true,
            'data' => $module
        ]);
    }
}
