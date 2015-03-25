@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>{{$product->name}}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <img src="../{{$product->picture}}">
        </div>

        <div class="col-xs-6">
            <p>Description: {{$product->description}}</p>
            <p>Price: {{$product->price}};-</p>
            <p>Stock: {{$product->stock}}</p>
        </div>
    </div>

    <div class="row">
        <br><br>
        <a href=" {{action('ProductsController@index')}} ">Back</a>
    </div>

@endsection





