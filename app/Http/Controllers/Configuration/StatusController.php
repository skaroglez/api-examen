<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Configuration\StatusServices;

class StatusController extends Controller
{
    //
    private $statusService;
    public function __construct(){
        $this->statusService = new StatusServices;
    }
    public function getAll(){
        $statuses =  $this->statusService->getAll();
        return response()->json([
            'success' => true,
            'data' => $statuses
        ]);
    }

    public function getById( $id ){
        $statuss =  $this->statusService->getById( $id );
        return response()->json([
            'success' => true,
            'data' => $statuss
        ]);
    }

    public function save( Request $request ){
        $status = $this->statusService->save( $request );
        return response()->json([
            'success' => true,
            'data' => $status
        ]);
    }

    public function update( Request $request, $id ){
        $status = $this->statusService->update( $request, $id );
        return response()->json([
            'success' => true,
            'data' => $status
        ]);
    }
}
