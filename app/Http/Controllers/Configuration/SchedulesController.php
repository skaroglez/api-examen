<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Configuration\SchedulesService;

class SchedulesController extends Controller
{
    private $schedulesService;
    public function __construct(){
        $this->schedulesService = new SchedulesService;
    }
    public function getActives( ) {
        $schedulesService =  $this->schedulesService->getActives();
        return response()->json([
            'success' => true,
            'data' => $schedulesService
        ]);
    }
    
}