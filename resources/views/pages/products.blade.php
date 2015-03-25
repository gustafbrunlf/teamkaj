@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>All of our fucking Products</h2>
        </div>
    </div>

    @if(count($products))

    <div class="row">

        @foreach($products as $product)

        <div class="col-xs-3">

            <h3><a href="{{action('ProductsController@show', [$product->id])}}">{{$product->name}}</a></h3>
        
                <img src="{{$product->picture}}" height="auto" width="100">
            
            <p>stock: {{$product->stock}}</p>
            <p>price: {{$product->price}};-</p>

        </div>

        @endforeach

    </div>

    

    @endif
<a href=" {{ action('ProductsController@create') }} ">Add product</a>
@endsection