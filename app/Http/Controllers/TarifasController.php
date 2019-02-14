<?php

namespace App\Http\Controllers;
use Notification;

use Illuminate\Http\Request;
use App\Tarifa;

class TarifasController extends Controller
{
    
    
    public function getIndex(){
        $tarifas= Tarifa::all();
        return view('tarifas.index', array('arrayTarifas' => $tarifas));
        
    }
    
    public function getShow($id){
         $tarifa= Tarifa::findOrFail($id);
         return view('tarifas.show', array('tarifa' => $tarifa));
 
    }
    
    public function getCreate(){
        return view('tarifas.create');

    }
    
    public function getEdit($id){
        $tarifa= Tarifa::findOrFail($id);
        return view('tarifas.edit', array('tarifa'=>$tarifa));

    }
    
    public function postCreate(Request $request){
        $tarifa = new Tarifa;
        $tarifa->tipus = $request->input('tipus');
        $tarifa->preu = $request->input('preu');
        $tarifa->save();
        Notification::success('Tarifa creada');
        return redirect('/tarifas');
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
    
}
