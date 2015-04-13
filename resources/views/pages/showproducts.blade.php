@extends('master')

@section('title')
Team Kaj - {{$product->name}}
@endsection

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
                <p><span class="bold">Article Number:</span> {{$product->artNo}}</p>
                <p><span class="bold">Description:</span> {{$product->description}}</p>
                <p><span class="bold">Stock: </span> {{$product->stock}} pcs</p>
                <p><span class="bold">Price: </span> {{$product->price}} SEK</p>

                @if($product->categories->isEmpty())
                         <span class="label label-default">Uncategorized</span>
                    @else 
                        @foreach($product->categories as $categories)
                            <a href="{{action('CategoriesController@show', $categories->slug)}}"><span class="label label-info">{{$categories->name}}</span></a>
                        
                        @endforeach
                @endif
          
            </div>

        </div>

        @if(Auth::check())

            <a href={{ action('ProductsController@edit', $product->artNo) }} class="btn btn-default form-control">Edit Product</a>

            <a href={{ action('ProductsController@confirmdelete', $product->artNo) }} class="btn btn-danger form-control">Delete Product</a>

        @endif

    </div>

        <br><br>
        <a href=" {{action('ProductsController@index')}} ">Back</a>

@endsection





