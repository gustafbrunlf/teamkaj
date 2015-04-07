@foreach(array_chunk($products->all(), 4) as $row)

    <div class='row'>   

        @foreach($row as $product) 

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
                        <p>Uncategorized</p>
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
                <div class="del_edit">
                    <div class="btn-group">
                        <a href={{ action('ProductsController@edit', $product->artNo) }} class="btn btn-success">Edit Product</a>
                        @if(Auth::user()->user_type === 0)
                        {!! Form::submit('Delete Product', ['class' => 'btn btn-danger']) !!}
                        @endif
                    </div>
                </div>
                @endif

                {!! Form::close() !!}

            </div>

        @endforeach


    </div>

        @endforeach