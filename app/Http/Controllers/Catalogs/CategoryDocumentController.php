<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Catalogs\CategoryDocumentService;
use Illuminate\Support\Facades\Storage;

class CategoryDocumentController extends Controller
{
    private $categoryDocumentService;
    public function __construct(){
        $this->categoryDocumentService = new CategoryDocumentService;
    }

    public function getDocument(Request $request)
    {
        $file = $request->query('file');
        if ($request->has('file')) {            
            return Storage::download($file);
        }
        return response()->json([
            'success' => false,
            'message' => 'por favor introduzca documento'
        ]);
    }

    public function getById( $id ){
        $category =  $this->categoryDocumentService->getById( $id );
        return response()->json([
            'success' => true,
            'data' => $category
        ]);
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

                $documentResponse = $this->categoryDocumentService->save( $document );
                return response()->json([
                    'success' => true,
                    'data' => $documentResponse,
                ]);
            }
        }
    }

    public function update( Request $request ) {
         $this->deleteImg($request);
          $this->save($request);
    }
    
     public function deleteImg( Request $request ) {
        $delete = $this->categoryDocumentService->delete( $request );
        return response()->json([
            'success' => true,
            'remove' => $delete
        ]);
    }
}
