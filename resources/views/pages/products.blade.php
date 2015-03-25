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

        <a href="{{action('ProductsController@show', [$product->id])}}">
        <div class="col-xs-2 product-container">
            
            <div class="product-img">
                <img src="{{$product->picture}}">
            </div>
            
            <div class="product-name">
                <h3>{{str_limit($product->name, $limit = 30, $end = '...')}}</h3>
            </div>

            <p>Stock: {{$product->stock}} pcs <br>
            Price: {{$product->price}} SEK</p>


        </div>
        </a>
        @if($x === 5 || $x===$items)
            </div>
            <?php $x = 1; ?>
        @else
            <?php $x++; ?>
        @endif

        @endforeach



    </div>

     <?php echo $products->render();?>

    @endif
<a href=" {{ action('ProductsController@create') }} ">Add product</a>


@endsection