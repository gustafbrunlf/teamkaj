@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>All of our fucking Products</h2>
        </div>
    </div>
    
    @if(count($products))
    <?php $x = 1 ;
        $items = count($products);
    ?>
    <div class="row" id="all-products">

@foreach($products as $product)
     @if($x === 1)
    <div class="row">
    @endif

        <div class="col-xs-2 product-container">
            
            <div class="product-img">
                <img src="{{$product->picture}}">
            </div>
            
            <div class="product-name">
                <h3><a href="{{action('ProductsController@show', [$product->id])}}">{{str_limit($product->name, $limit = 30, $end = '...')}}</a></h3>
            </div>

            <p>Stock: {{$product->stock}} <br>
                Price: {{$product->price}};-</p>

        </div>
        @if($x === 5 || $x===$items)
            </div>
            <?php $x =1;?>
        @else
            <?php $x++?> 
        @endif

        @endforeach

    </div>

    

    @endif
<a href=" {{ action('ProductsController@create') }} ">Add product</a>
@endsection