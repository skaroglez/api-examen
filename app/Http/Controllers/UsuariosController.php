<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuarios;
use App\Models\Administration\Capturists;
use App\Services\Administration\CapturistsService;

class UsuariosController extends Controller {
    protected $capturistasRepo;
    public function __construct(){
        
    }
    public function getAll() {
        $usuarios = Usuarios::getAll();
        return response()->json([
            'success' => true,
            'data' => $usuarios
        ]);
    }

    public function getUserByName( $nombre ) {
        return Usuarios::getUserByName( $nombre );
    }

    public function getUsuariosContratistas(CapturistsService $capturista  ){
        return $capturista->get();
        // return Usuarios::find(1);
    }
}
