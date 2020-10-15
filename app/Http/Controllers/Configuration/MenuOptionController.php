<?php

namespace App\Http\Controllers\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\configuracion\Menu;
use App\Services\Configuration\MenuOptionService;

class MenuOptionController extends Controller {
    private $menuOptionService;
    public function __construct(){
        $this->menuOptionService = new MenuOptionService;
    }
    public function getAll(){
        $menuOptions =  $this->menuOptionService->getAll();
        return response()->json([
            'success' => true,
            'data' => $menuOptions
        ]);
    }

    public function getById( $id ){
        $menuOptions =  $this->menuOptionService->getById( $id );
        return response()->json([
            'success' => true,
            'data' => $menuOptions
        ]);
    }

    public function getByParams( Request $request ){
        $modules =  $this->menuOptionService->getByParams( $request );
        return response()->json([
            'success' => true,
            'data' => $modules
        ]);
    }

    public function save( Request $request ){
        $menuOption = $this->menuOptionService->save( $request );
        return response()->json([
            'success' => true,
            'data' => [$menuOption]
        ]);
    }

    public function update( Request $request, $id ){
        $menuOption = $this->menuOptionService->update( $request, $id );
        return response()->json([
            'success' => true,
            'data' =>[ $menuOption]
        ]);
    }
}
