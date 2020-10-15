<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Catalogs\CategoriesListService;

class CategoriesListController extends Controller
{
    private $categoriesListService;
    public function __construct(){
        $this->categoriesListService = new CategoriesListService;
    }

  
    public function getById( $id ){
        $categories =  $this->categoriesListService->getById( $id );
        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    public function getByParams( Request $request ) {
        $categories =  $this->categoriesListService->getByParams( $request );
        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    public function save( Request $request ){
        $isExist = $this->categoriesListService->exists($request);
        if (count($isExist)) {
            return response()->json([
                "success" => false,
                "message" => "Ya existe la categoria.",
            ]);
        }

        $idCategory = $this->categoriesListService->save( $request );
        return response()->json([
                'success' => true,
                'data' => [$idCategory],
                'message' => 'Categoria agregada correctamente'
            ]);
    }

    public function update( Request $request, $id ){
        if($request->desCategory){
            $isExist = $this->categoriesListService->exists($request);
            if (count($isExist)) {
                return response()->json([
                    "success" => false,
                    "message" => "Ya existe la Categoria.",
                ]);
            }
        }
        $categoriesListService = $this->categoriesListService->update( $request, $id );
        return response()->json([
            'success' => true,
            'data' => $categoriesListService
        ]);
    }
    
    public function getActives( ) {
        $categoriesListService =  $this->categoriesListService->getActives();
        return response()->json([
            'success' => true,
            'data' => $categoriesListService
        ]);
    }
    
}