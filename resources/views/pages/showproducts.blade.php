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

        @if(Auth::check())
            <div class="edit_btn">
                <a href="{{ action('ProductsController@edit', $product->slug) }}" class="btn btn-default">Edit Product</a>
            </div>
        @endif

        <div class="col-sm-12 col-md-6 single-img">
            <img src="../{{$product->picture}}">
        </div>

        <div class="col-sm-12 col-md-6">

            <div class="info">
                <p><span class="bold">Article Number:</span> {{$product->artNo}}</p>
                <p><span class="bold">Description:</span> {{$product->description}}</p>
                <p><span class="bold">Stock: </span> {{$product->stock}} pcs</p>
                <p><span class="bold">Price: </span> {{$product->price}} SEK</p>

                @if($product->categories->isEmpty())

                     <br>
                @else 
                    @foreach($product->categories as $categories)
                        <a href="{{action('CategoriesController@show', $categories->slug)}}"><span class="label label-info">{{$categories->name}}</span></a>
                    @endforeach
                @endif

                <h3>Related items:</h3>
                @foreach($similar as $similar)
                    @unless($similar->name == $product->name)
                        <a href="{{action('ProductsController@show', $similar->slug)}}">
                        <div class="similar">
                            <img src="../{{$similar->picture}}">
                            <p><span class="bold">{{$similar->name}}</span></p>
                        </div>
                        </a>
                    @endunless
                @endforeach

            </div>

        </div>

    </div>   

        <br><br>
        <a href=" {{action('ProductsController@index')}} ">Back</a>

@endsection





