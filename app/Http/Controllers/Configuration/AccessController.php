<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Configuration\AccessService;

class AccessController extends Controller
{
    private $accessService;

    public function __construct() 
    {
        $this->accessService = new AccessService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accesses =  $this->accessService->getAll();
        return response()->json([
            'success' => true,
            'data' => $accesses
        ]);
    }

    public function params(Request $request) 
    {
        $accesses =  $this->accessService->getByParams($request);
        return response()->json([
            'success' => true,
            'data' => $accesses
        ]);
    }

    public function all(Request $request)
    {
        $accesses = $this->accessService->getAccesses($request);
        return response()->json([
            'success' => true,
            'data' => $accesses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $access = $this->accessService->save($request);
        return response()->json([
            'success' => true,
            'data' => $access,
        ]);
    }

    public function storePermission(Request $request)
    {
        $permission = $this->accessService->savePermission($request);
        return response()->json([
            'success' => true,
            'data' => $permission
        ]);
    }

    public function delete( $idAccess ){
        $access = $this->accessService->delete($idAccess);
        return response()->json([
            'success' => true,
            'data' => $access
        ]);
    }
}
