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

    

    @endif
<a href=" {{ action('ProductsController@create') }} ">Add product</a>
<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php $x = 1;?>

    @while ($pages >=1)

        @if($x===1)
            <li class="active"><a href="#">1</a></li>
        @else
      
        <li><a href="#">{{$x}}</a></li>

        @endif 

        <?php $pages--;$x++;?>
        
    @endwhile

    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

@endsection