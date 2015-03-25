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
    <div class="row">

@foreach($products as $product)
     @if($x === 1)
    <div class="row">
    @endif

        <div class="col-xs-2">

            <h3><a href="{{action('ProductsController@show', [$product->id])}}">{{$product->name}}</a></h3>
        
                <img src="{{$product->picture}}" height="auto" width="100">
            
            <p>stock: {{$product->stock}}</p>
            <p>price: {{$product->price}};-</p>

        </div>
        @if($x === 6 || $x===$items)
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