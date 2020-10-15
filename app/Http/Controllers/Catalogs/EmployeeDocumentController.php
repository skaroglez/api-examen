<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Catalogs\EmployeeDocumentService;
use Illuminate\Support\Facades\Storage;

class EmployeeDocumentController extends Controller
{
    private $employeeDocumentService;
    public function __construct(){
        $this->employeeDocumentService = new EmployeeDocumentService;
    }

    public function getDocument(Request $request)
    {
        $file = $request->query('file');
        if ($request->has('file')) {            
            return Storage::download($file);
            //return '/storage/app/'.$file;
        }
        return response()->json([
            'success' => false,
            'message' => 'por favor introduzca documento'
        ]);
    }

    public function getById( $id ){
        $employee =  $this->employeeDocumentService->getById( $id );
        return response()->json([
            'success' => true,
            'data' => $employee
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

                $documentResponse = $this->employeeDocumentService->save( $document );
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
        $delete = $this->employeeDocumentService->delete( $request );
        return response()->json([
            'success' => true,
            'remove' => $delete
        ]);
    }
}
