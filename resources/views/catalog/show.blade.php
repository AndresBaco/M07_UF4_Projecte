@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="row">

    <div class="col-sm-4">
        <img src="{{$movie->poster}}" style="width:350px">   

    </div>
    <div class="col-sm-8">
        <h1>{{ $movie->title}}</h1>
        <h3>Año: {{$movie->year}}</h3>
        {{-- TODO: Datos de la película --}}
        <h3>Director: {{$movie->director}}</h3>
        <p><strong>Resumen: </strong> {{$movie->synopsis}}</p>
        <p><strong>Tarifa: </strong> {{$tarifa->tipus}}</p> 
        <p><strong>Idioma: </strong> {{$idioma->idioma}}</p> 
        <p><strong>Estado: </strong> 
        
        @if ($movie->rented == true)
            Película disponible 
            <form action="{{action('CatalogController@putRent', $movie->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
                <button type="submit" class="btn btn-success" style="display:inline">
                    Alquilar
                </button>
            </form>
             
        @else
            Pelicula alquilada
            <form action="{{action('CatalogController@putReturn', $movie->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
                <button type="submit" class="btn btn-primary" style="display:inline">
                    Devolver película
                </button>
            </form>
            
           
        @endif



            <a href="{{ url('/catalog/edit/' . $movie->id) }}" class="btn btn-warning"> Editar</a>

            <form action="{{action('CatalogController@deleteMovie', $movie->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" style="display:inline">
                Eliminar
            </button>
            </form>
            
            <a href="{{ url('/catalog') }}" class="btn btn-secondary"> Volver al listado</a>

            <form action="{{url('/rating/vote/' . $movie->id)}}"
            method="POST" style="display:inline">
            {{ csrf_field() }}
            
            <h3>Valoración: </h3><br>
            <input type="radio" name="rating" value="1" checked> <span class="fa fa-star checked"></span><br>
              <input type="radio" name="rating" value="2"> <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><br>
              <input type="radio" name="rating" value="3"> <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><br>
              <input type="radio" name="rating" value="4"> <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><br>
              <input type="radio" name="rating" value="5"> <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><br>

              <h3>Comentarios</h3><br>
              <textarea  name="comentari" placeholder="Di lo que piensas"></textarea>

              <button type="submit" class="btn btn-primary" style="display:inline">
                Enviar voto/comentario
            </button>

            @foreach( $users as $user )
            <h4>{{$user[0]}}</h4>
            <h6>Nota: {{$user[1]}}</h6>
            <p>{{$user[2]}}</p>
            @endforeach
            
            
            
    </div>
</div>


@stop