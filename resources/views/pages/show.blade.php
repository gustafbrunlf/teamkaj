@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>{{$product->name}}</h2>
        </div>
    </div>

    <div class="row product-container single">
        <div class="col-xs-6 single-img">
            <img src="../{{$product->picture}}">
        </div>

        <div class="col-xs-6">
            <div class="info">
                <p><span class="bold">Description:</span> {{$product->description}}</p>
                <p><span class="bold">Price: </span> {{$product->price}} SEK</p>
                <p><span class="bold">Stock: </span> {{$product->stock}} pcs</p>
            </div>
        </div>
    </div>

        <br><br>
        <a href=" {{action('ProductsController@index')}} ">Back</a>

@endsection




