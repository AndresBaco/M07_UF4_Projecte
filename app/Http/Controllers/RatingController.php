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
    
}
