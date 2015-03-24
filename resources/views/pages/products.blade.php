@extends('master')

@section('body')

    @if(count($products))

    <div class="row">
        <div class="col-xs-12">
            <h2>All of our fucking Products</h2>
        </div>
    </div>

    <div class="row">

        @foreach($products as $product)

        <div class="col-xs-3">

            <h3>{{$product->name}}</h3>
            @if($product->image)
                <img src="{{$product->image}}">
            @endif
            <p>stock: {{$product->stock}}</p>
            <p>price: {{$product->price}}</p>

        </div>

        @endforeach

    </div>

    <a href=" {{ action('ProductsController@create') }} ">Add product</a>

    @endif

@endsection