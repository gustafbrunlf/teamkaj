@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>{{$product->title}}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <img src="{{$product->image}}">
        </div>

        <div class="col-xs-6">
            <p>{{$product->description}}</p>
            <p>{{$product->price}}</p>
            <p>Stock: {{$product->stock}}</p>
        </div>
    </div>

@endsection



