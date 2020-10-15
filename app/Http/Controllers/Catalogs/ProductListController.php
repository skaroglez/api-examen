<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Catalogs\ProductListService;

class ProductListController extends Controller
{
    private $productListService;
    public function __construct(){
        $this->productListService = new ProductListService;
    }

  
    public function getById( $id ){
        $products =  $this->productListService->getById( $id );
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    public function getByParams( Request $request ) {
        $products =  $this->productListService->getByParams( $request );
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    public function save( Request $request ){
        $isExist = $this->productListService->exists($request);
        if (count($isExist)) {
            return response()->json([
                "success" => false,
                "message" => "Ya existe la producto en la categoria seleccionada.",
            ]);
        }

        $idCategory = $this->productListService->save( $request );
        return response()->json([
                'success' => true,
                'data' => [$idCategory],
                'message' => 'Producto agregado correctamente'
            ]);
    }

    public function update( Request $request, $id ){
        if($request->desProduct){
            $isExist = $this->productListService->exists($request);
            if (count($isExist)) {
                return response()->json([
                    "success" => false,
                    "message" => "Ya existe el producto en la categoria seleccionada."
                ]);
            }
        }
        
        $productListService = $this->productListService->update( $request, $id );
        return response()->json([
            'success' => true,
            'data' => $productListService
        ]);
    }
    
    public function getActives( ) {
        $productListService =  $this->productListService->getActives();
        return response()->json([
            'success' => true,
            'data' => $productListService
        ]);
    }
     public function getActivesByIdCategory($idCategory) {
        $productListService =  $this->productListService->getActivesByIdCategory($idCategory);
        return response()->json([
            'success' => true,
            'data' => $productListService
        ]);
    }
    
}