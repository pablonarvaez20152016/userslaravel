<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Movie::all() );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json( Movie::all() );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula=Movie::findOrFail($id);
        if (!is_null($pelicula))
            return response()->json(Movie::findOrFail($id));
        else
            return response()->json( ['error' => 404 ] ); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelicula=Movie::findOrfail($id);
        $pelicula->fill($request->all());
        $pelicula->save();
        return response()->json(['error'=>false,'msg'=>'la pelicula ha sido actualizada'])
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula=Movie::findOrfail($id);
        $pelicula->delete();
        return response()->json(['error'=>false,'msg'=>'la pelicula ha sido eliminada'])
    }

    public function putRent($id)
    {
        $m = Movie::findOrFail( $id );
        $m->rented = true;
        $m->save();
        return response()->json( ['error' => false, 'msg' => 'La película se ha marcado como alquilada' ] ); 
    }
    public function putReturn($id)
    {
        $m = Movie::findOrFail( $id );
        $m->rented = false;
        $m->save();
        return response()->json( ['error' => false, 'msg' => 'La película se ha marcado como devuelta' ] ); 
    }
}
