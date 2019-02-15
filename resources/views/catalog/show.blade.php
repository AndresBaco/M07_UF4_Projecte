@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">
        <img src="{{$pelicula->poster}}" style="width:350px">   

    </div>
    <div class="col-sm-8">
        <h1>{{ $pelicula->title}}</h1>
        <h3>Año: {{$pelicula->year}}</h3>
        {{-- TODO: Datos de la película --}}
        <h3>Director: {{$pelicula->director}}</h3>
        <p><strong>Resumen: </strong> {{$pelicula->synopsis}}</p> <br><br>
        <p><strong>Estado: </strong> 
        
        @if ($pelicula->rented == true)
            Película disponible 
            <form action="{{action('CatalogController@putRent', $pelicula->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
                <button type="submit" class="btn btn-success" style="display:inline">
                    Alquilar
                </button>
            </form>
             
        @else
            Pelicula alquilada
            <form action="{{action('CatalogController@putReturn', $pelicula->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
                <button type="submit" class="btn btn-primary" style="display:inline">
                    Devolver película
                </button>
            </form>
            
           
        @endif
             <a href="{{ url('/catalog/edit/' . $pelicula->id) }}" class="btn btn-warning"> Editar</a>

            <form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" style="display:inline">
                Eliminar
            </button>
            </form>
            
            <a href="{{ url('/catalog') }}" class="btn btn-secondary"> Volver al listado</a>


    </div>
</div>


@stop