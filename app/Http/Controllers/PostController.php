<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // utilizamos __construct para ejevutar la funcion al momento que se instancia el  PostController
    public function __construct()
    {
        // ejecutamos el middleware auth para confirmar que el usuarioe esta authenticado
        $this -> middleware(('auth'));
    }
    //
    public function index(){
        
        return view('dashboard');
    }
}
