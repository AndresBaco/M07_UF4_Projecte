<?php

namespace App\Http\Controllers;
use Notification;

use Illuminate\Http\Request;
use App\Movie;
use App\Rating;
use App\User;
use App\Idioma;
use App\Tarifa;
use App\Exports\MoviesExport;
//use App\Exports\Movie;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    
    
    public function getIndex(){
        $movies= Movie::all();
        return view('catalog.index', array('arrayPeliculas' => $movies));
        
    }
    
    public function getShow($id){
         
         $ratings = Rating::where('mid', $id)->get();
         $user = User::where('id',1)->get();
         $movie= Movie::findOrFail($id);
         $users = array();
          foreach ($ratings as $value) {
              $user = User::findOrFail($value->uid);    
              //echo $user["name"];
              $users[] = [$user->name, $value->rating, $value->comment];
          }
          //dd($users);
         //dd($users);
         return view('catalog.show', compact('movie','users','comment'));
 
    }
    // public function getShow($id){
        
    //      $ratings = Rating::where('mid', $id)->get();
    //      $nomsUsers = array();
    //      foreach ($ratings as $value) {
    //          $user = User::findOrFail($value->uid);    
    //          $nomsUsers[] = $user->name;
    //      }
         
    //      $movie= Movie::findOrFail($id);
    //      return view('catalog.show', array('pelicula' => $movie), array('arrayRatings' => $ratings),array('nombres'=>$nomsUsers));
 
    // }
    public function getExcel(){
        return Excel::download(new MoviesExport, 'Peliculas.xlsx');
    }
    public function getCreate(){
        $idiomas = Idioma::all();
        $tarifas= Tarifa::all();
        return view('catalog.create', array('arrayTarifas' => $tarifas), array('arrayIdiomas' => $idiomas));

    }
    
    public function getEdit($id){
        $movie= Movie::findOrFail($id);
        $tarifa= Tarifa::all();
        $idioma= Idioma::all();
        return view('catalog.edit', compact('movie', 'tarifa', 'idioma'));

    }
    
    public function postCreate(Request $request){
        $movie = new Movie;
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');

        $tarifainput= $request->input('tid');
        $tarifa = Tarifa::where('tipus', $tarifainput)->firstOrFail();
        $movie->tid= $tarifa->id;

        $movie->rented = 0;

        $idioma = Idioma::where('idioma', $request->input('idioma'))->firstOrFail();
        $movie->idiomaid =  $idioma->id; 

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
