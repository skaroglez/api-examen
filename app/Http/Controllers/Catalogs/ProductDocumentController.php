<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Catalogs\ProductDocumentService;
use Illuminate\Support\Facades\Storage;

class ProductDocumentController extends Controller
{
    private $productDocumentService;
    public function __construct(){
        $this->productDocumentService = new ProductDocumentService;
    }

    public function save(Request $request) {
        $fileInForm = 'filename';

        if ($request->hasFile($fileInForm)) {

            $file = $request->file($fileInForm);
            if ($file->isValid()) {
                $hashedName = hash_file('md5', $file->path());
                $newFilename = $hashedName;

                $save = Storage::disk('local')->put($newFilename, $file, 'public');
                $document = (object)$request->all();
                $document->link = $save;

                $documentResponse = $this->productDocumentService->save( $document );
                return response()->json([
                    'success' => true,
                    'data' => $documentResponse,
                ]);
            }
        }
    }

     public function deleteImg( Request $request ) {
        $delete = $this->productDocumentService->delete( $request );
        return response()->json([
            'success' => true,
            'remove' => $delete
        ]);
    }

    
    public function getAllById( $id ){
        $products =  $this->productDocumentService->getAllById( $id );
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
}
