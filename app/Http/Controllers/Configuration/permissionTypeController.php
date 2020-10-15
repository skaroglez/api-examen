<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Configuration\PermissionTypeService;

class PermissionTypeController extends Controller
{
    //
    private $permissionTypeService;
    public function __construct(){
        $this->permissionTypeService = new PermissionTypeService;
    }
    public function getActives(){
        $statuses =  $this->permissionTypeService->getActives();
        return response()->json([
            'success' => true,
            'data' => $statuses
        ]);
    }
}
