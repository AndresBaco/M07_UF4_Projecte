@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir nueva tarifa
         </div>
         <div class="card-body" style="padding:30px">
            <form method="post" action="{{url('/tarifas/create')}}">
            
             {{ csrf_field() }}
                

            <div class="form-group">
               <label for="tipus">Nombre de la Tarifa: </label>
               <input type="text" name="tipus" id="tipus" class="form-control">
            </div>

            <div class="form-group">
                <label for="preu">Precio de la Tarifa: </label>
                <input type="number" name="preu" id="preu" class="form-control">
            </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Añadir Tarifa
               </button>
            </div>
            </form>

         </div>
      </div>
   </div>
</div>

@stop