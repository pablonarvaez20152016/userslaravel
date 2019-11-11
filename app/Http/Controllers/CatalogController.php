<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Movie;

class CatalogController extends Controller
{   
    public function getIndex(){
        $peliculas=Movie::all();
       return view('catalog.index',array('arrayPeliculas'=> $peliculas));
        
    }
    public function getShow($id){
        $pelicula=Movie::findOrFail($id);
        if (!is_null($pelicula))
            return view('catalog.show',array('pelicula' => $pelicula));
        else
            return response('no encontrado',404);
    }
    public function getCreate(){
        return view('catalog.create');
    }
    public function getEdit($id){
        $pelicula=Movie::findOrFail($id);
        if (!is_null($pelicula))
            return view('catalog.edit',array('pelicula' => $pelicula));
        else
            return response('no encontrado',404);
    }

}
