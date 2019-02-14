@extends('layouts.master')

@section('content')

<div class="row">

    @foreach( $arrayTarifas as $tarifa )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
    	<img src="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjM__72jbngAhVQRBoKHT2FBbMQjRx6BAgBEAU&url=https%3A%2F%2Fmiplanhoy.com%2Ftarifas-publicidad%2F&psig=AOvVaw0OJdLklmidYBFSaU6arxrW&ust=1550161013858282">
        <a href="{{ url('/tarifas/show/' . $tarifa->id ) }}">
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$tarifa->tipus}}<br> {{$tarifa->preu}}€
            </h4>
        </a>

    </div>
    @endforeach
    <br>
    <a href="{{ url('/tarifas/create') }}" class="btn btn-primary"> Nueva tarifa</a>
</div>

@stop