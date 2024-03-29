@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar película
         </div>
         <div class="card-body" style="padding:30px">
            <form method="post" action="{{url('/catalog/create')}}">
            
             {{ csrf_field() }}
                

            <div class="form-group">
               <label for="title">Título</label>
               <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="year">Año</label>
                <input type="text" name="year" id="year" class="form-control">
            </div>

            <div class="form-group">
                <label for="director">Director</label>
                <input type="text" name="director" id="director" class="form-control">
            </div>

            <div class="form-group">
                <label for="poster">Poster</label><br />
                <input name="poster" type="text" class="form-control" id="poster">
            </div>

            <div class="form-group">
               <label for="synopsis">Resumen</label>
               <textarea name="synopsis" id="synopsis" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="idioma">Idioma</label><br />
                <select name="idioma" id="idioma" class="form-control" rows="3">

                 @foreach( $arrayIdiomas as $idioma )

                 <option > {{$idioma->idioma}}</option>

                 @endforeach
                </select>
            </div>


             <div class="form-group">
               <label for="tid">Tarifa</label>
               <select name="tid" id="tid" class="form-control" rows="3">

                 @foreach( $arrayTarifas as $tarifa )

                 <option > {{$tarifa->tipus}}</option>

                 @endforeach
                </select>
            </div>
               
            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Añadir película
               </button>
            </div>
            </form>

         </div>
      </div>
   </div>
</div>

@stop