@extends('layouts.master')

@section('content')

<div class="row">

    @foreach( $arrayTarifas as $tarifa )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
    	<img src="{{ asset('images/tarifa.png') }}" style="height:150px">
        <a href="{{ url('/tarifas/show/' . $tarifa->id ) }}">
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$tarifa->tipus}}<br> {{$tarifa->preu}}€
            </h4>
        </a>

    </div>
    @endforeach
    
</div>
<br>
<a href="{{ url('/tarifas/create') }}" class="btn btn-primary"> Nueva tarifa</a>
@stop