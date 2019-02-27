@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar película
         </div>
         <div class="card-body" style="padding:30px">
            <form method="post" action="{{ url('/catalog/edit/' . $movie->id) }}">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="form-group">
               <label for="title">Título</label>
               <input type="text" name="title" id="title" class="form-control" value="{{$movie->title}}">
            </div>

            <div class="form-group">
                <label for="year">Año</label>
                <input type="text" name="year" id="year" class="form-control" value="{{$movie->year}}">
            </div>
o
            <div class="form-group">
                <label for="director">Director</label>
                <input type="text" name="director" id="director" class="form-control" value="{{$movie->director}}">
            </div>

            <div class="form-group">
                <label for="poster">Poster</label><br />
                <input name="poster" type="text" id="poster" class="form-control" value="{{$movie->poster}}">
            </div>

            <div class="form-group">
               <label for="synopsis">Resumen</label>
               <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$movie->synopsis}} </textarea>
            </div>


            <div class="form-group">
               <label for="tid">Tarifa</label>
               <select name="tid" id="tid" class="form-control" rows="3">

                 @foreach( $tarifa as $value )

                 <option > {{$value->tipus}}</option>

                 @endforeach
                </select>
            </div>

            <div class="form-group">
               <label for="tid">Tarifa</label>
               <select name="tid" id="tid" class="form-control" rows="3">

                 @foreach( $idioma as $value )

                 <option > {{$value->idioma}}</option>

                 @endforeach
                </select>
            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@stop