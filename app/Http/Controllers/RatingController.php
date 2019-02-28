<?php

namespace App\Http\Controllers;
use Notification;

use Illuminate\Http\Request;
use App\Rating;
use App\User;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{    
    public function getShow($id){
         $tarifas= Tarifa::findOrFail($id);
         return view('tarifas.show', array('tarifa' => $tarifa));
 
    }
    
    public function getCreate(){
        return view('tarifas.create');

    }
    
    public function getEdit($id){
        $tarifa= Tarifa::findOrFail($id);
        return view('tarifas.edit', array('tarifa'=>$tarifa));

    }
    
    public function postCreate(Request $request, $id){
        $rating = new Rating;
        $rating->mid=$id;
        $rating->uid=Auth::user()->id;
        $consultaRepe = Rating::where('uid', Auth::user()->id)->where('mid',$id)->get();

        if (sizeof($consultaRepe)!=0){
            Notification::error('Ya has comentado.');
            return redirect('/catalog/show/'. $id);
        }

        $rating->rating = $request->input('rating');
        $rating->comment = $request->input('comentari');
        $rating->save();
        Notification::success('Tu voto se ha enviado.');
        return redirect('/catalog/show/'. $id);
    }
    public function putEdit(Request $request, $id){
        $tarifa = Tarifa::findOrFail($id);
        $tarifa->tipus = $request->input('tipus');
        $tarifa->preu = $request->input('preu');
        $tarifa->save();
        Notification::success('Tarifa editada');
        return redirect('/tarifas/show/'. $id);
        
    }
        
    public function deleteTarifa($id){
        $tarifa = Tarifa::findOrFail($id);
        $tarifa->delete();
        Notification::success('Tarifa borrada');
        return redirect('/tarifas');
    }
    public function ratingDelete($id){
        $rating = Rating::where('uid', Auth::user()->id)->where('mid',$id)->get();
        $rating->delete();
        Notification::success('Comentario eliminado');
        return redirect('/tarifas/show/'. $id);
    }
    
}
