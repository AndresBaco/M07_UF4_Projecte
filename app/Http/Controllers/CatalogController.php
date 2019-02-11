<?php

namespace App\Http\Controllers;
use Notification;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{
    
    
    public function getIndex(){
        $movies= Movie::all();
        return view('catalog.index', array('arrayPeliculas' => $movies));
        
    }
    
    public function getShow($id){
         $movie= Movie::findOrFail($id);
         return view('catalog.show', array('pelicula' => $movie));
 
    }
    
    public function getCreate(){
        return view('catalog.create');

    }
    
    public function getEdit($id){
        $movie= Movie::findOrFail($id);
        return view('catalog.edit', array('pelicula'=>$movie));

    }
    
    public function postCreate(Request $request){
        $movie = new Movie;
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->tid= 1;
        $movie->rented = 0;
        $movie->save();
        Notification::success('Pelicula creada');
        return redirect('/catalog');
    }
    public function putEdit(Request $request, $id){
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();
        Notification::success('Pelicula editada');
        return redirect('/catalog/show/'. $id);
        
    }
    public function putRent($id){
        $movie = Movie::findOrFail($id);
        $movie->rented = 0;
        $movie->save();
        Notification::success('Película alquilada');
        return redirect('/catalog/show/'. $id);
    }
    public function putReturn($id){
        $movie = Movie::findOrFail($id);
        $movie->rented = 1;
        $movie->save();
        Notification::success('La película vuelve a estar disponible');
        return redirect('/catalog/show/'. $id);
        
    }
    public function deleteMovie($id){
        $movie = Movie::findOrFail($id);
        $movie->delete();
        Notification::success('Pelicula borrada');
        return redirect('/catalog');
    }
    
}
