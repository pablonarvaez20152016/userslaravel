<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Movie;
use Notify;

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
        if (!is_null($pelicula)){
            return view('catalog.edit',array('pelicula' => $pelicula));
        } 
        else
            return response('no encontrado',404);
    }
    public function postCreate(Request $request){
        $pelicula=$request->all();
        $p = new Movie;

        $p->title = $pelicula['title'];

        $p->year = $pelicula['year'];

        $p->director = $pelicula['director'];

        $p->poster = $pelicula['poster'];

        $p->synopsis = $pelicula['synopsis']; $p->save();
        Notify::success('La pelicula se ha creado');
        return redirect('/catalog');

    }
    public function putEdit(Request $request,$id){

        $peliculaedit=Movie::findOrFail($id);

        $datos=$request->all();

        $peliculaedit->title = $datos['title'];

        $peliculaedit->year = $datos['year'];

        $peliculaedit->director = $datos['director'];

        $peliculaedit->poster = $datos['poster'];

        $peliculaedit->synopsis = $datos['synopsis']; $peliculaedit->save();
        Notify::success('La pelicula se ha modificado');
      
        return redirect('/catalog/show/'.$id);
    }

    public function putRent(Request $request,$id)
    {
        $peliculaedit=Movie::findOrFail($id);

        $peliculaedit->rented = 1;

         $peliculaedit->save();
        Notify::success('La pelicula se ha alquilado');
      
        return redirect('/catalog/show/'.$id);
    }
    public function putReturn(Request $request,$id)
    {
        $peliculaedit=Movie::findOrFail($id);

        $peliculaedit->rented = 0;

        $peliculaedit->save();
        Notify::success('La pelicula esta Disponible');
      
        return redirect('/catalog/show/'.$id);
    }
    public function deleteMovie(Request $request,$id)
    {
        $peliculaedit=Movie::findOrFail($id);
        $peliculaedit->delete();
        Notify::success('La pelicula ha sido eliminada');
        return redirect('/catalog');

    }

}
