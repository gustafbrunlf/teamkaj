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

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <a href="{{action('ProductsController@show', [$product->id])}}">
            <div class="product-container">            
                <div class="product-img">
                    <img src="../{{$product->picture}}">
                </div>
                
                <div class="product-name">
                    <h3>{{str_limit($product->name, $limit = 30, $end = '...')}}</h3>
                </div>

                <p>Stock: {{$product->stock}} pcs <br>
                Price: {{$product->price}} SEK</p>
            </div>
            </a>
        </div>
      
        @if($x === 4 || $x===$items)
            </div>
            <?php $x = 1; ?>
        @else
            <?php $x++; ?>
        @endif

        @endforeach



    </div>

     {!! $products->render() !!}

    @endif
{{--<a href=" {{ action('ProductsController@create') }} ">Add product</a>--}}


@endsection