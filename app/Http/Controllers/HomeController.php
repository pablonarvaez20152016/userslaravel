<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        // Filtrar todos los métodos
        $this->middleware('auth');
    }

    public function getHome(){          
         return redirect('/catalog');           
     }
     
    public function index()
    {
        return view('home');
    }
}
