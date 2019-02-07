<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

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


    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->rented = 0;
        $movie->save();
        return response()->json( ['error' => false,
                          'msg' => 'La película se ha creado' ] );
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return response()->json($movie);
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
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();
        return response()->json( ['error' => false,
                          'msg' => 'La película se ha editado' ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->json( ['error' => false,
                              'msg' => 'La película se ha eliminado' ] );
    }
    
    public function putRent($id){
        $m = Movie::findOrFail( $id );
        $m->rented = false;
        $m->save();
        return response()->json( ['error' => false,
                              'msg' => 'La película se ha marcado como alquilada' ] );
    }
    
    public function putReturn($id){
        $m = Movie::findOrFail( $id );
        $m->rented = true;
        $m->save();
        return response()->json( ['error' => false,
                              'msg' => 'La película se ha marcado como disponible' ] );
    }
}
