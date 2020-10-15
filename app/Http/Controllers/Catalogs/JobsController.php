<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Catalogs\JobsService;

class JobsController extends Controller
{
    private $jobsService;
    public function __construct(){
        $this->jobsService = new JobsService;
    }
    public function getActives( ) {
        $jobsService =  $this->jobsService->getActives();
        return response()->json([
            'success' => true,
            'data' => $jobsService
        ]);
    }
    
}