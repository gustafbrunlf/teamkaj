@extends('master')


@section('dropdown')

 <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories<span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
       
    @foreach($categories as $categories)
       <li><a href="{{action('ProductsController@category', $categories->slug)}}">{{$categories->name}}</a></li>
    @endforeach

    </ul>
</li>

@endsection


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
                <a href="{{action('ProductsController@show', [$product->artNo])}}">
                <div class="product-container">            
                    <div class="product-img">
                        <img src="../{{$product->picture}}">
                    </div>
                    
                    <div class="product-name">
                        <h3>{{str_limit($product->name, $limit = 30, $end = '...')}}</h3>
                    </div>

                    <p>

                    ArtNo: {{$product->artNo}} <br>
                    Stock: {{$product->stock}} pcs <br>
                    Price: {{$product->price}} SEK</p>

                    @if($product->categories->isEmpty())
                        <p>Uncategoriezed</p>
                    @else
                        <p>Under: 
                        @foreach($product->categories as $categories)
                            {{$categories->name}}
                        @endforeach
                        </p>
                    @endif
                    
                </div>
                </a>
                {!! Form::open(['method' => 'DELETE', 'action' => ['ProductsController@destroy', $product->artNo]]) !!}

                @if(Auth::check())

                    <div class="btn-group">

                        <a href={{ action('ProductsController@edit', $product->artNo) }} class="btn btn-success">Edit Product</a>

                        @if(Auth::user()->user_type === 0)

                            {!! Form::submit('Delete Product', ['class' => 'btn btn-danger']) !!}

                        @endif

                    </div>

                @endif
            </div>

            {!! Form::close() !!}
          
            @if($x === 4 || $x===$items)
                </div>
                <?php $x = 1; ?>
            @else
                <?php $x++; ?>
            @endif

@endforeach

    <div> {!! $products->render() !!} </div>

    @endif

    </div>

@endsection