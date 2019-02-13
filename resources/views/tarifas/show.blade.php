@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-8">
        <h1>Tarifa: {{ $tarifa->tipus}}</h1>
        <h3>Precio: {{$tarifa->preu}}€</h3>
             <a href="{{ url('/tarifas/edit/' . $tarifa->id) }}" class="btn btn-warning"> Editar</a>

            <form action="{{action('TarifasController@deleteTarifa', $tarifa->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" style="display:inline">
                Eliminar
            </button>
            </form>
            
            <a href="{{ url('/tarifas') }}" class="btn btn-secondary"> Volver al listado</a>


    </div>
</div>


@stop