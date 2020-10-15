<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Catalogs\EmployeesListService;
use DateTime;
class EmployeesListController extends Controller
{
    private $employeesListService;
    public function __construct(){
        $this->employeesListService = new EmployeesListService;
    }

  
    public function getById( $id ){
        $employee =  $this->employeesListService->getById( $id );
        return response()->json([
            'success' => true,
            'data' => $employee
        ]);
    }

    public function getByParams( Request $request ) {
        $employees =  $this->employeesListService->getByParams( $request );
        return response()->json([
            'success' => true,
            'data' => $employees
        ]);
    }

    public function save( Request $request ){
        $isExist = $this->employeesListService->exists($request);
        if (count($isExist)) {
            return response()->json([
                "success" => false,
                "message" => "Ya se encuentra registrado el empleado.",
            ]);
        }

        $idEmployee = $this->employeesListService->save( $request );
        return response()->json([
                'success' => true,
                'data' => [$idEmployee],
                'message' => 'Empleado registrado correctamente'
            ]);
    }

    public function update( Request $request, $id ){

       if($request->firstName){
            $isExist = $this->employeesListService->exists($request);
            if (count($isExist)) {
                return response()->json([
                    "success" => false,
                    "message" => "Ya se encuentra registrado el empleado."
                ]);
            }
       }
               
        
        $employeesListService = $this->employeesListService->update( $request, $id );
        return response()->json([
            'success' => true,
            'data' => $employeesListService
        ]);
    }
    
  
    
}